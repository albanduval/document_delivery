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
     * @ParamConverter("document", class="ChmDocumentBundle:Document", options={"mapping"={"slug"="slug"}})
     */
    public function downloadAction($document)
    {

        try {
            $restrictionsChecker = $this->get('chm_document.restrictions_checker');

            if (true || $restrictionsChecker->check($document)) {

                $response = new BinaryFileResponse($document->getAbsoluteFileName());

                //$response->headers->set('Content-Type', $document->getFiletype());
                //$response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, $document->getNiceName());
                $response->setContentDisposition('attachment', $document->getNiceName() . '.' . $document->getExtension() );
                $response->setAutoEtag();
                $response->setAutoLastModified();
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
            } else {
                // error
                $errorMessage = 'Request did not pass restrictions, see log files for details.';
            }

        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
        }

        // retrieve data from request
        $request = $this->get('request');
        $userAgent = $request->headers->get('User-Agent');
        $sourceIp = $request->getClientIp();

        // add failed document delivery
        $delivery = new Delivery();
        $delivery->setSuccess(false);
        $delivery->setSourceIp($sourceIp);
        $delivery->setUserAgent($userAgent);
        $delivery->setFailureMessage($errorMessage);

        $em = $this->getDoctrine()->getManager();
        $em->persist($delivery);
        $em->flush();

        throw $e;
        throw $this->createNotFoundException( 'No such document : ' . $document->getSlug());
    }

}
