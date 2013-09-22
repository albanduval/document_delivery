<?php

namespace Chm\Bundle\DocumentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Chm\Bundle\DocumentBundle\Entity\Document;

class DownloadDocumentController extends Controller
{
	/**
	 * @ParamConverter("post", class="ChmDocumentBundle:Document", options={"slug" = "document_slug"})
	 */
    public function downloadAction(Document $document)
    {
        return $this->render(
            'ChmDocumentBundle:DownloadDocument:download.html.twig',
            array('document_slug' => $document_slug)
        );
    }

}
