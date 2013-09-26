<?php
namespace Chm\Bundle\DocumentBundle\RestrictionsChecker;

use Chm\Bundle\DocumentBundle\Entity\SecretRestriction;

class SecretRestrictionChecker
{
    public function check(SecretRestriction $restriction)
    {
        throw new \Symfony\Component\Intl\Exception\MethodNotImplementedException(__METHOD__);
    }
}
