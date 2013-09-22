<?php

namespace Chm\Bundle\DocumentBundle\Entity;

/**
 * Document
 */
class Document
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $niceName;

    /**
     * @var string
     */
    private $filetype;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $validTo;

    /**
     * @var string
     */
    private $notifySuccess;

    /**
     * @var string
     */
    private $notifyFailure;

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
     * Set slug
     *
     * @param  string   $slug
     * @return Document
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set niceName
     *
     * @param  string   $niceName
     * @return Document
     */
    public function setNiceName($niceName)
    {
        $this->niceName = $niceName;

        return $this;
    }

    /**
     * Get niceName
     *
     * @return string
     */
    public function getNiceName()
    {
        return $this->niceName;
    }

    /**
     * Set filetype
     *
     * @param  string   $filetype
     * @return Document
     */
    public function setFiletype($filetype)
    {
        $this->filetype = $filetype;

        return $this;
    }

    /**
     * Get filetype
     *
     * @return string
     */
    public function getFiletype()
    {
        return $this->filetype;
    }

    /**
     * Set createdAt
     *
     * @param  \DateTime $createdAt
     * @return Document
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
     * Set validTo
     *
     * @param  \DateTime $validTo
     * @return Document
     */
    public function setValidTo($validTo)
    {
        $this->validTo = $validTo;

        return $this;
    }

    /**
     * Get validTo
     *
     * @return \DateTime
     */
    public function getValidTo()
    {
        return $this->validTo;
    }

    /**
     * Set notifySuccess
     *
     * @param  string   $notifySuccess
     * @return Document
     */
    public function setNotifySuccess($notifySuccess)
    {
        $this->notifySuccess = $notifySuccess;

        return $this;
    }

    /**
     * Get notifySuccess
     *
     * @return string
     */
    public function getNotifySuccess()
    {
        return $this->notifySuccess;
    }

    /**
     * Set notifyFailure
     *
     * @param  string   $notifyFailure
     * @return Document
     */
    public function setNotifyFailure($notifyFailure)
    {
        $this->notifyFailure = $notifyFailure;

        return $this;
    }

    /**
     * Get notifyFailure
     *
     * @return string
     */
    public function getNotifyFailure()
    {
        return $this->notifyFailure;
    }

    /**
     * Set user
     *
     * @param  \Chm\Bundle\DocumentBundle\Entity\User $user
     * @return Document
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
     * @return Document
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     */
    public function checkRestrictions()
    {
        foreach($this->getIpRestrictions() as $restriction)
        {
            $restriction->check();
        }
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ip_restrictions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ip_restrictions = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add ip_restrictions
     *
     * @param \Chm\Bundle\DocumentBundle\Entity\IpRestriction $ipRestrictions
     * @return Document
     */
    public function addIpRestriction(\Chm\Bundle\DocumentBundle\Entity\IpRestriction $ipRestrictions)
    {
        $this->ip_restrictions[] = $ipRestrictions;
    
        return $this;
    }

    /**
     * Remove ip_restrictions
     *
     * @param \Chm\Bundle\DocumentBundle\Entity\IpRestriction $ipRestrictions
     */
    public function removeIpRestriction(\Chm\Bundle\DocumentBundle\Entity\IpRestriction $ipRestrictions)
    {
        $this->ip_restrictions->removeElement($ipRestrictions);
    }

    /**
     * Get ip_restrictions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIpRestrictions()
    {
        return $this->ip_restrictions;
    }
}