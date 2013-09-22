<?php

namespace Chm\Bundle\DocumentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Chm\Bundle\DocumentBundle\Entity\Document;
use Chm\Bundle\DocumentBundle\Entity\Delivery;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

class DownloadDocumentController extends Controller
{
    /**
     * ParamConverter("document", class="ChmDocumentBundle:Document", options={"slug" = "document_slug"})
     * @Template()
     */
    public function downloadAction($document_slug)
    {
        $document = $this
                        ->getDoctrine()
                        ->getRepository('ChmDocumentBundle:Document')
                        ->findOneBySlug($document_slug);

        try{
            $document->checkRestrictions();

            $response = new BinaryFileResponse($document->getSystemFilePath());

            $response->headers->set('Content-Type', 'text/plain');
            $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, 'filename.txt');
        } catch (\Exception $e) {

            // retrieve data from request
            $request = $this->get('request');
            $userAgent = $request->headers->get('User-Agent');
            $sourceIp = $request->getClientIp();

            // add failed document delivery
            $delivery = new Delivery();
            $delivery->setSuccess(false);
            $delivery->setSourceIp($sourceIp);
            $delivery->setUserAgent($userAgent);
            $delivery->setFailureMessage($e->getMessage());

            $em = $this->getDoctrine()->getManager();
            $em->persist($delivery);
            $em->flush();

            throw new FileNotFoundException($document_slug);
        }
        return array('document' => $document);
    }

}
