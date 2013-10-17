<?php
namespace Chm\Bundle\DocumentBundle\RestrictionsChecker;

use Chm\Bundle\DocumentBundle\Entity\RestrictionInterface;

abstract class AbstractRestrictionChecker
{

    public function check(RestrictionInterface $restriction)
    {
        throw new \Symfony\Component\Intl\Exception\MethodNotImplementedException(__METHOD__);
    }

}
