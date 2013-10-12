<?php

namespace Chm\Bundle\DocumentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Chm\Bundle\DocumentBundle\Entity\Document;
use Chm\Bundle\DocumentBundle\Entity\Delivery;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Chm\Bundle\DocumentBundle\RestrictionsChecker\SecretRequiredException;
use Chm\Bundle\DocumentBundle\Form\SecretKeyType;

class DocumentDownloadController extends Controller
{
    /**
     * @Template()
     */
    public function listAction()
    {
        $repository = $this
                        ->getDoctrine()
                        ->getRepository('ChmDocumentBundle:Document');

        $documents = $repository->findAllowedByUser($this->getUser());

        return array(
            'documents' => $documents
        );
    }

    /**
     * @ParamConverter("document", class="ChmDocumentBundle:Document", options={"mapping"={"slug"="slug"}})
     */
    public function downloadAction($document)
    {

        try {
            $restrictionsChecker = $this->get('chm_document.restrictions_checker');

            if ($restrictionsChecker->check($document)) {

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
                $delivery = $document->logDelivery(true, $sourceIp, $userAgent, $this->getUser());

                $em = $this->getDoctrine()->getManager();
                $em->persist($delivery);
                $em->flush();

                return $response;
            } else {
                // error
                $errorMessage = 'Request did not pass restrictions, see log files for details.';
            }

        } catch (SecretRequiredException $e) {
            $form = $this->createForm(new SecretKeyType(), [], ['action' => $this->generateUrl('chm_document_download', ['slug'=>$document->getSlug()])]);

            return $this->render(
                                'ChmDocumentBundle:DocumentDownload:secretForm.html.twig',
                                array('form' => $form->createView())
                            );
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
        }

        // retrieve data from request
        $request = $this->get('request');
        $userAgent = $request->headers->get('User-Agent');
        $sourceIp = $request->getClientIp();

        // add failed document delivery
        $delivery = $document->logDelivery($success = false, $sourceIp, $userAgent, $this->getUser());

        $em = $this->getDoctrine()->getManager();
        $em->persist($delivery);
        $em->flush();

        throw $this->createNotFoundException( 'No such document : ' . $document->getSlug());
    }

}
