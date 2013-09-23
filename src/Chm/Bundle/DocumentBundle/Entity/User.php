<?php

namespace Chm\Bundle\DocumentBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

/**
 */
class User extends BaseUser
{
    /**
     * @var integer
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
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
