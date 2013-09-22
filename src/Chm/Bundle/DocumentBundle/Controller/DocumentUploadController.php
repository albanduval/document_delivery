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
    public function editAction($id)
    {
        $document = new Document();

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
            $em->persist($document);
            $em->flush();
 
            //return $this->redirect($this->generateUrl('article_show', array('id' => $document->getId())));
             
        }
 
        return array(
            'document' => $document,
            'form'   => $form->createView()
        );
    }

}
