<?php

namespace Chm\Bundle\DocumentBundle\Entity;

/**
 * Delivery
 */
class Delivery
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $sourceIp;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var string
     */
    private $userAgent;

    /**
     * @var boolean
     */
    private $success;

    /**
     * @var string
     */
    private $failureMessage;

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
     * Set sourceIp
     *
     * @param  string   $sourceIp
     * @return Delivery
     */
    public function setSourceIp($sourceIp)
    {
        $this->sourceIp = $sourceIp;

        return $this;
    }

    /**
     * Get sourceIp
     *
     * @return string
     */
    public function getSourceIp()
    {
        return $this->sourceIp;
    }

    /**
     * Set createdAt
     *
     * @param  \DateTime $createdAt
     * @return Delivery
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set userAgent
     *
     * @param  string   $userAgent
     * @return Delivery
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * Get userAgent
     *
     * @return string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * Set success
     *
     * @param  boolean  $success
     * @return Delivery
     */
    public function setSuccess($success)
    {
        $this->success = $success;

        return $this;
    }

    /**
     * Get success
     *
     * @return boolean
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * Set failureMessage
     *
     * @param  string   $failureMessage
     * @return Delivery
     */
    public function setFailureMessage($failureMessage)
    {
        $this->failureMessage = $failureMessage;

        return $this;
    }

    /**
     * Get failureMessage
     *
     * @return string
     */
    public function getFailureMessage()
    {
        return $this->failureMessage;
    }

    /**
     * Set document
     *
     * @param  \Chm\Bundle\DocumentBundle\Entity\Document $document
     * @return Delivery
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
     * @return Delivery
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
     * @param  integer  $id
     * @return Delivery
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
