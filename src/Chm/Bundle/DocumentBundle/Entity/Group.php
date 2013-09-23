<?php

namespace Chm\Bundle\DocumentBundle\Entity;

use FOS\UserBundle\Model\Group as BaseGroup;
use Doctrine\ORM\Mapping as ORM;

/**
 */
class Group extends BaseGroup
{
    /**
      * @var integer
      */
    protected $id;

    public function __construct($name, $roles = array())
    {
        parent::__construct($name, $roles = array());
        // your own logic
    }
}