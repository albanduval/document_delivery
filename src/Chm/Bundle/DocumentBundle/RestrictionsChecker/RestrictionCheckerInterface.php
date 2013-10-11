<?php
namespace Chm\Bundle\DocumentBundle\RestrictionsChecker;

use Chm\Bundle\DocumentBundle\Entity\RestrictionInterface;

interface RestrictionCheckerInterface
{

	public function check(RestrictionInterface $restriction);
	
}