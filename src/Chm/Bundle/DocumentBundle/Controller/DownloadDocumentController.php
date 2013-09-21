<?php

namespace Chm\Bundle\DocumentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DownloadDocumentController extends Controller
{
    public function downloadAction($document_slug)
    {
	    return $this->render(
	        'ChmDocumentBundle:DownloadDocument:download.html.twig',
	        array('document_slug' => $document_slug)
	    );
    }

}
