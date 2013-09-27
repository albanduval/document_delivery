<?php

namespace Chm\Bundle\DocumentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
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

        $documents = $repository->findAll();

        return array(
            'documents' => $documents
        );
    }

    /**
     * @Template()
     */
    public function editAction($id)
    {
        if ($id === 0) {
            $document = new Document();
        } else {
            $repository = $this
                            ->getDoctrine()
                            ->getRepository('ChmDocumentBundle:Document');
            $document = $repository->find($id);
        }

        $form   = $this->createForm(new DocumentType(), $document);

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
    public function saveAction()
    {
        $document  = new Document();
        $request = $this->getRequest();
        $form    = $this->createForm(new DocumentType(), $document);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();

            // this could be removed with usage of livecycle callbacks on the entity : prePersist and postPersist event
            $document->upload();

            $em->persist($document);
            $em->flush();

            //return $this->redirect($this->generateUrl('article_show', array('id' => $document->getId())));

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
    public function saveAction($document)
    {
        $document  = new Document();
        $request = $this->getRequest();
        $form    = $this->createForm(new DocumentType(), $document);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();

            // this could be removed with usage of livecycle callbacks on the entity : prePersist and postPersist event
            $document->upload();

            $em->persist($document);
            $em->flush();


        }

        return $this->redirect($this->generateUrl('chm_document_list'));
    }

}
