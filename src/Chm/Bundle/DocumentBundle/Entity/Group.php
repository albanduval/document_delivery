<?php

namespace Chm\Bundle\DocumentBundle\Entity;

use FOS\UserBundle\Model\Group as BaseGroup;

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

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
