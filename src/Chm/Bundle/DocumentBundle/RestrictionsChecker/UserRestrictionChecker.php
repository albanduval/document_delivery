<?php
namespace Chm\Bundle\DocumentBundle\RestrictionsChecker;

use Chm\Bundle\DocumentBundle\Entity\UserRestriction;

class UserRestrictionChecker
{
    public function check(UserRestriction $restriction)
    {
        throw new \Symfony\Component\Intl\Exception\MethodNotImplementedException(__METHOD__);
    }
}
