<?php
namespace Chm\Bundle\DocumentBundle\RestrictionsChecker;

use Chm\Bundle\DocumentBundle\Entity\DownloadCountRestriction;

class DownloadCountRestrictionChecker
{
    public function check(DownloadCountRestriction $restriction)
    {
        throw new \Symfony\Component\Intl\Exception\MethodNotImplementedException(__METHOD__);
    }
}
