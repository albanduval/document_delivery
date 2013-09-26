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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ip_restrictions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $secret_restrictions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $download_count_restrictions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $user_restrictions;

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
     * returns true if document can still be downloaded
     *
     * @return boolean
     */
    public function isValid()
    {
        return rand(0,100) > 50;
    }

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
     * @param  \Chm\Bundle\DocumentBundle\Entity\IpRestriction $ipRestrictions
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

    /**
     * Set updatedAt
     *
     * @param  \DateTime $updatedAt
     * @return Document
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
     * Add secret_restrictions
     *
     * @param  \Chm\Bundle\DocumentBundle\Entity\SecretRestriction $secretRestrictions
     * @return Document
     */
    public function addSecretRestriction(\Chm\Bundle\DocumentBundle\Entity\SecretRestriction $secretRestrictions)
    {
        $this->secret_restrictions[] = $secretRestrictions;

        return $this;
    }

    /**
     * Remove secret_restrictions
     *
     * @param \Chm\Bundle\DocumentBundle\Entity\SecretRestriction $secretRestrictions
     */
    public function removeSecretRestriction(\Chm\Bundle\DocumentBundle\Entity\SecretRestriction $secretRestrictions)
    {
        $this->secret_restrictions->removeElement($secretRestrictions);
    }

    /**
     * Get secret_restrictions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSecretRestrictions()
    {
        return $this->secret_restrictions;
    }

    /**
     * Add download_count_restrictions
     *
     * @param  \Chm\Bundle\DocumentBundle\Entity\DownloadCountRestriction $downloadCountRestrictions
     * @return Document
     */
    public function addDownloadCountRestriction(\Chm\Bundle\DocumentBundle\Entity\DownloadCountRestriction $downloadCountRestrictions)
    {
        $this->download_count_restrictions[] = $downloadCountRestrictions;

        return $this;
    }

    /**
     * Remove download_count_restrictions
     *
     * @param \Chm\Bundle\DocumentBundle\Entity\DownloadCountRestriction $downloadCountRestrictions
     */
    public function removeDownloadCountRestriction(\Chm\Bundle\DocumentBundle\Entity\DownloadCountRestriction $downloadCountRestrictions)
    {
        $this->download_count_restrictions->removeElement($downloadCountRestrictions);
    }

    /**
     * Get download_count_restrictions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDownloadCountRestrictions()
    {
        return $this->download_count_restrictions;
    }

    /**
     * Add user_restrictions
     *
     * @param  \Chm\Bundle\DocumentBundle\Entity\UserRestriction $userRestrictions
     * @return Document
     */
    public function addUserRestriction(\Chm\Bundle\DocumentBundle\Entity\UserRestriction $userRestrictions)
    {
        $this->user_restrictions[] = $userRestrictions;

        return $this;
    }

    /**
     * Remove user_restrictions
     *
     * @param \Chm\Bundle\DocumentBundle\Entity\UserRestriction $userRestrictions
     */
    public function removeUserRestriction(\Chm\Bundle\DocumentBundle\Entity\UserRestriction $userRestrictions)
    {
        $this->user_restrictions->removeElement($userRestrictions);
    }

    /**
     * Get user_restrictions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserRestrictions()
    {
        return $this->user_restrictions;
    }

    /**
     * Set createdBy
     *
     * @param  \Chm\Bundle\DocumentBundle\Entity\User $createdBy
     * @return Document
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
     * @return Document
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
    /**
     * @var file
     */
    private $file;

    /**
     * Set file
     *
     * @param  \file    $file
     * @return Document
     */
    public function setFile(\file $file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return \file
     */
    public function getFile()
    {
        return $this->file;
    }
}
