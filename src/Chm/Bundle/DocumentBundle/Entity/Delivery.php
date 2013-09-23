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
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $createdBy;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \DateTime
     */
    private $updatedBy;

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

    /**
     * Set updatedAt
     *
     * @param  \DateTime $updatedAt
     * @return Delivery
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set createdBy
     *
     * @param  \Chm\Bundle\DocumentBundle\Entity\User $createdBy
     * @return Delivery
     */
    public function setCreatedBy(\Chm\Bundle\DocumentBundle\Entity\User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \Chm\Bundle\DocumentBundle\Entity\User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updatedBy
     *
     * @param  \Chm\Bundle\DocumentBundle\Entity\User $updatedBy
     * @return Delivery
     */
    public function setUpdatedBy(\Chm\Bundle\DocumentBundle\Entity\User $updatedBy = null)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return \Chm\Bundle\DocumentBundle\Entity\User
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }
}
