<?php

namespace Chm\Bundle\DocumentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Chm\Bundle\DocumentBundle\Entity\Document;
use Chm\Bundle\DocumentBundle\Entity\DocumentLocatorMessage;
use Chm\Bundle\DocumentBundle\Form\DocumentType;
use Chm\Bundle\DocumentBundle\Form\DocumentLocatorMessageType;

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

        if ($this->getUser()->hasRole('ROLE_ADMIN')) {
            // retrieve documents owned by current user
            $documents = $repository->findAll();
        } else {
            // retrieve documents owned by current user
            $documents = $repository->findByCreatedBy($this->getUser());
        }

        $filterForm = $this->createFormBuilder()
            ->add('slug', 'text')
            ->add('owner', 'choice')
            ->add('date_restriction', 'checkbox')
            ->add('ip_restriction', 'checkbox')
            ->add('secret_restriction', 'checkbox')
            ->add('download_count_restriction', 'checkbox')
            ->add('user_restriction', 'checkbox')
            ->add('filter', 'submit')
            ->getForm();

        return array(
            'documents'  => $documents,
            'filterForm' => $filterForm->createView(),
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

            // those loops could probably be removed by using livecycle callbacks on the entity postPersist event
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

    /**
     * Save document action
     *
     * @Template()
     * @ParamConverter("document", class="ChmDocumentBundle:Document", options={"mapping"={"id"="id"}})
     */
    public function sendAction($document)
    {
        $request = $this->getRequest();

        $documentLocatorMessage = new DocumentLocatorMessage();
        $documentLocatorMessage->setDocument($document);

        $form    = $this->createForm(new DocumentLocatorMessageType(), $documentLocatorMessage);

        if ('POST' === $request->getMethod()) {
            $form->bind($request);

            if ($form->isValid()) {
                try {
                    /* abandoned the placeholders behavior, the sent mail is now mainly automatic, just including a custom small message
                    $placeholders = [
                                    ];
                    $documentLocatorMessage->replacePlaceHolders($placeholders);
                    */
                    $message = \Swift_Message::newInstance()
                                ->setTo($documentLocatorMessage->getEmail())
                                ->setSubject($documentLocatorMessage->getSubject())
                                ->setBody($documentLocatorMessage->getMessage());
                    if ($this->get('mailer')->send($message)) {
                        $documentLocatorMessage->setSuccess(false);
                    }
                } catch (\Exception $e) {
                    throw $e;
                    $documentLocatorMessage->setSuccess(false);
                }

                $em = $this->getDoctrine()->getManager();
                $em->persist($documentLocatorMessage);
                $em->flush();
            }
        }

        return array(
            'document' => $document,
            'form'   => $form->createView()
        );
    }

}
