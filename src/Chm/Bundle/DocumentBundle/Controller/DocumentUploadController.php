<?php

namespace Chm\Bundle\DocumentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Chm\Bundle\DocumentBundle\Entity\Document;
use Chm\Bundle\DocumentBundle\Form\DocumentType;

class DocumentUploadController extends Controller
{
    /**
     * @Template()
     */
    public function listAction()
    {
        $repository = $this
                        ->getDoctrine()
                        ->getRepository('ChmDocumentBundle:Document');

        // retrieve documents owned by current user
        $documents = $repository->findByCreatedBy($this->getUser());

        return array(
            'documents' => $documents
        );
    }

    /**
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        if ($id === 0) {
            $document = new Document();
        } else {
            $document = $em->getRepository('ChmDocumentBundle:Document')->find($id);
        }

        $form   = $this->createForm(new DocumentType(), $document, ['action' => $this->generateUrl('chm_document_save', ['id'=>$id])]);

        return array(
            'document' => $document,
            'form'   => $form->createView()
        );
    }

    /**
     * Save document action
     *
     * @Template("ChmDocumentBundle:DocumentUpload:edit.html.twig")
     */
    public function saveAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();

        if ($id > 0) {
            $document = $em->getRepository('ChmDocumentBundle:Document')->find($id);
        } else {
            $document = new Document();
        }

        $form    = $this->createForm(new DocumentType(), $document);
        $form->bind($request);

        if ($form->isValid()) {

            // this could be removed with usage of livecycle callbacks on the entity : prePersist and postPersist event
            $document->upload();

            $em->persist($document);

            foreach ($document->getDateRestrictions() as $restriction) {
                $restriction->setDocument($document);
                $em->persist($restriction);
            }

            foreach ($document->getIpRestrictions() as $restriction) {
                $restriction->setDocument($document);
                $em->persist($restriction);
            }

            foreach ($document->getSecretRestrictions() as $restriction) {
                $restriction->setDocument($document);
                $em->persist($restriction);
            }

            foreach ($document->getDownloadCountRestrictions() as $restriction) {
                $restriction->setDocument($document);
                $em->persist($restriction);
            }

            foreach ($document->getUserRestrictions() as $restriction) {
                $restriction->setDocument($document);
                $em->persist($restriction);
            }

            $em->flush();

            return $this->redirect($this->generateUrl('chm_document_edit', array('id' => $document->getId())));

        }

        return array(
            'document' => $document,
            'form'   => $form->createView()
        );
    }

    /**
     * Save document action
     *
     * @Template("ChmDocumentBundle:DocumentUpload:edit.html.twig")
     * @ParamConverter("document", class="ChmDocumentBundle:Document", options={"mapping"={"id"="id"}})
     */
    public function deleteAction($document)
    {
        $em = $this->getDoctrine()->getManager();

        // this could be removed with usage of livecycle callbacks on the entity : prePersist and postPersist event
        if (!$document->deleteFile()) {
            $this->get('session')->getFlashBag()->add(
                'warning',
                'The document ' . $document->getAbsoluteFileName() . ' could not be deleted on filesystem (document either not present or not writable)'
            );
        }
        $em->remove($document);
        $em->flush();

        $this->get('session')->getFlashBag()->add(
            'success',
            'The document has been deleted successfully.'
        );

        return $this->redirect($this->generateUrl('chm_document_list'));
    }

}
