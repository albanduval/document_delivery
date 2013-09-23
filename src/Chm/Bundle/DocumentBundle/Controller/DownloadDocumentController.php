<?php

namespace Chm\Bundle\DocumentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Chm\Bundle\DocumentBundle\Entity\Document;
use Chm\Bundle\DocumentBundle\Entity\Delivery;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DownloadDocumentController extends Controller
{
    /**
     * @ParamConverter("document", class="ChmDocumentBundle:Document", options={"mapping"={"document_slug"="slug"}})
     */
    public function downloadAction($document)
    {

        try {
            $document->checkRestrictions();

            $response = new BinaryFileResponse($document->getFilePath(), $status = 200, $headers = array(), $public = true, $contentDisposition = 'attachment', $autoEtag = true, $autoLastModified = true);

        } catch (\AccessDeniedException $e) {
            // redirect to the login page !
            throw $e;
        } catch (\Exception $e) {
throw $e;
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

            throw $this->createNotFoundException( 'No such document : ' . $document->getSlug());
        }

        //$response->headers->set('Content-Type', $document->getFiletype());
        //$response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, $document->getNiceName());
        $response::trustXSendfileTypeHeader();

        // retrieve data from request
        $request = $this->get('request');
        $userAgent = $request->headers->get('User-Agent');
        $sourceIp = $request->getClientIp();

        // add failed document delivery
        $delivery = new Delivery();
        $delivery->setSuccess(true);
        $delivery->setSourceIp($sourceIp);
        $delivery->setUserAgent($userAgent);

        $em = $this->getDoctrine()->getManager();
        $em->persist($delivery);
        $em->flush();

        return $response;
    }

}
