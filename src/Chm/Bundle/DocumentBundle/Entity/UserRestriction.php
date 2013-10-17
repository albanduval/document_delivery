<?php

namespace Chm\Bundle\DocumentBundle\Entity;

/**
 * UserRestriction
 */
class UserRestriction implements RestrictionInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var \Chm\Bundle\DocumentBundle\Entity\Document
     */
    private $document;

    /**
     * @var \Chm\Bundle\DocumentBundle\Entity\User
     */
    private $user;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set comment
     *
     * @param  string          $comment
     * @return UserRestriction
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set document
     *
     * @param  \Chm\Bundle\DocumentBundle\Entity\Document $document
     * @return UserRestriction
     */
    public function setDocument(\Chm\Bundle\DocumentBundle\Entity\Document $document = null)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Get document
     *
     * @return \Chm\Bundle\DocumentBundle\Entity\Document
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Set user
     *
     * @param  \Chm\Bundle\DocumentBundle\Entity\User $user
     * @return UserRestriction
     */
    public function setUser(\Chm\Bundle\DocumentBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Chm\Bundle\DocumentBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set id
     *
     * @param  integer         $id
     * @return UserRestriction
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Check if current user is allowed to download the file
     *
     *  @return boolean
     */
    public function check()
    {
        throw AccessDeniedException();

        return true;
    }
}
