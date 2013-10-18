<?php

namespace Chm\Bundle\DocumentBundle\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Chm\Bundle\DocumentBundle\Entity\Delivery;

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
    private $fileName;

    /**
     * @var string
     */
    private $niceName;

    /**
     * This is not a column in the table, it is used to nicely handle file upload by the form
     */
    private $file;

    /**
     * @var string
     */
    private $mimeType;

    /**
     * @var string
     */
    private $extension;

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
    private $ipRestrictions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $secretRestrictions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $downloadCountRestrictions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $userRestrictions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $dateRestrictions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $deliveries;

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
     * Set mimeType
     *
     * @param  string   $mimeType
     * @return Document
     */
    public function setMimetype($mimeType)
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    /**
     * Get mimeType
     *
     * @return string
     */
    public function getMimetype()
    {
        return $this->mimeType;
    }

    /**
     * Set extension
     *
     * @param  string   $extension
     * @return Document
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
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
        $this->dateRestrictions          = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ipRestrictions            = new \Doctrine\Common\Collections\ArrayCollection();
        $this->secretRestrictions        = new \Doctrine\Common\Collections\ArrayCollection();
        $this->downloadCountRestrictions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->userRestrictions          = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ipRestrictions
     *
     * @param  \Chm\Bundle\DocumentBundle\Entity\IpRestriction $ipRestrictions
     * @return Document
     */
    public function addIpRestriction(\Chm\Bundle\DocumentBundle\Entity\IpRestriction $ipRestrictions)
    {
        $this->ipRestrictions[] = $ipRestrictions;

        return $this;
    }

    /**
     * Remove ipRestrictions
     *
     * @param \Chm\Bundle\DocumentBundle\Entity\IpRestriction $ipRestrictions
     */
    public function removeIpRestriction(\Chm\Bundle\DocumentBundle\Entity\IpRestriction $ipRestrictions)
    {
        $this->ipRestrictions->removeElement($ipRestrictions);
    }

    /**
     * Get ipRestrictions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIpRestrictions()
    {
        return $this->ipRestrictions;
    }

    /**
     * Get deliveries
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDeliveries()
    {
        return $this->deliveries;
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
     * Add secretRestrictions
     *
     * @param  \Chm\Bundle\DocumentBundle\Entity\SecretRestriction $secretRestrictions
     * @return Document
     */
    public function addSecretRestriction(\Chm\Bundle\DocumentBundle\Entity\SecretRestriction $secretRestrictions)
    {
        $this->secretRestrictions[] = $secretRestrictions;

        return $this;
    }

    /**
     * Remove secretRestrictions
     *
     * @param \Chm\Bundle\DocumentBundle\Entity\SecretRestriction $secretRestrictions
     */
    public function removeSecretRestriction(\Chm\Bundle\DocumentBundle\Entity\SecretRestriction $secretRestrictions)
    {
        $this->secretRestrictions->removeElement($secretRestrictions);
    }

    /**
     * Get secretRestrictions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSecretRestrictions()
    {
        return $this->secretRestrictions;
    }

    /**
     * Add downloadCountRestrictions
     *
     * @param  \Chm\Bundle\DocumentBundle\Entity\DownloadCountRestriction $downloadCountRestrictions
     * @return Document
     */
    public function addDownloadCountRestriction(\Chm\Bundle\DocumentBundle\Entity\DownloadCountRestriction $downloadCountRestrictions)
    {
        $this->downloadCountRestrictions[] = $downloadCountRestrictions;

        return $this;
    }

    /**
     * Remove downloadCountRestrictions
     *
     * @param \Chm\Bundle\DocumentBundle\Entity\DownloadCountRestriction $downloadCountRestrictions
     */
    public function removeDownloadCountRestriction(\Chm\Bundle\DocumentBundle\Entity\DownloadCountRestriction $downloadCountRestrictions)
    {
        $this->downloadCountRestrictions->removeElement($downloadCountRestrictions);
    }

    /**
     * Get downloadCountRestrictions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDownloadCountRestrictions()
    {
        return $this->downloadCountRestrictions;
    }

    /**
     * Add userRestrictions
     *
     * @param  \Chm\Bundle\DocumentBundle\Entity\UserRestriction $userRestrictions
     * @return Document
     */
    public function addUserRestriction(\Chm\Bundle\DocumentBundle\Entity\UserRestriction $userRestrictions)
    {
        $this->userRestrictions[] = $userRestrictions;

        return $this;
    }

    /**
     * Remove userRestrictions
     *
     * @param \Chm\Bundle\DocumentBundle\Entity\UserRestriction $userRestrictions
     */
    public function removeUserRestriction(\Chm\Bundle\DocumentBundle\Entity\UserRestriction $userRestrictions)
    {
        $this->userRestrictions->removeElement($userRestrictions);
    }

    /**
     * Get userRestrictions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserRestrictions()
    {
        return $this->userRestrictions;
    }

    /**
     * Add dateRestrictions
     *
     * @param  \Chm\Bundle\DocumentBundle\Entity\DateRestriction $dateRestrictions
     * @return Document
     */
    public function addDateRestriction(\Chm\Bundle\DocumentBundle\Entity\DateRestriction $dateRestrictions)
    {
        $this->dateRestrictions[] = $dateRestrictions;

        return $this;
    }

    /**
     * Remove dateRestrictions
     *
     * @param \Chm\Bundle\DocumentBundle\Entity\DateRestriction $dateRestrictions
     */
    public function removeDateRestriction(\Chm\Bundle\DocumentBundle\Entity\DateRestriction $dateRestrictions)
    {
        $this->dateRestrictions->removeElement($dateRestrictions);
    }

    /**
     * Get dateRestrictions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDateRestrictions()
    {
        return $this->dateRestrictions;
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
     * Set file
     *
     * @param  UploadedFile $file
     * @return Document
     */
    public function setFile(UploadedFile $file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
    /**
     * @var string
     */
    private $filePath;

    /**
     * Set filePath
     *
     * @param  string   $filePath
     * @return Document
     */
    public function setFilepath($filePath)
    {
        $this->filePath = $filePath;

        return $this;
    }

    /**
     * Get filePath
     *
     * @return string
     */
    public function getFilepath()
    {
        return $this->filePath;
    }
    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../../uploads/'.$this->getUploadDir();
    }
    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'documents/';
    }
    public function getAbsoluteFileName()
    {
        return $this->filePath . $this->fileName ;
    }


    /**
     * @var boolean
     */
    private $keepOriginalExtension = false;

    /**
     *
     * @return boolean
     */
    public function getKeepOriginalExtension()
    {
        return $this->keepOriginalExtension;
    }

    /**
     * Tells to keep the file extension of the uploaded file, otherwise the extension will be guessed from file content
     *
     * @param  boolean Whether or not keep the orinal extension
     * @return Document
     */
    public function setKeepOriginalExtension($keepOriginalExtension)
    {
        $this->keepOriginalExtension = $keepOriginalExtension;

        return $this;
    }

    /**
     */
    public function upload()
    {
         // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }
        // set the path property to the fileName where you've saved the file
        $this->mimeType  = $this->getFile()->getClientMimeType();
        if ($this->keepOriginalExtension) {
            $this->extension = $this->getFile()->getClientOriginalExtension();
        } else {
            $this->extension = $this->getFile()->guessClientExtension();
        }
        $this->fileName  = date('Ymd-His') . '_' . sha1(uniqid(mt_rand(), true)) . '.' . $this->extension;
        $this->filePath  = $this->getUploadRootDir();
        // use the original file name here but you should
        // sanitize it at least to avoid any security issues
        // move takes the target directory and then the
        // target fileName to move to
        $this->getFile()->move(
            $this->filePath,
            $this->fileName
        );
        // clean up the file property as you won't need it anymore
        $this->file = null;
    }

    /**
     * Delete the associated physical file
     *
     * @return boolean true on success
     */
    public function deleteFile()
    {
        try {
            return unlink($this->getAbsoluteFileName());
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Logs a delivery attempt
     */
    public function logDelivery($success, $sourceIp, $userAgent)
    {
        $delivery = new Delivery();
        $delivery->setSuccess(true);
        $delivery->setSourceIp($sourceIp);
        $delivery->setUserAgent($userAgent);
        $delivery->setDocument($this);

        return $delivery;
    }

    public function hasRestriction()
    {
        return $this->hasDateRestriction()
            || $this->hasDownloadCountRestriction()
            || $this->hasIpRestriction()
            || $this->hasSecretRestriction()
            || $this->hasUserRestriction();
    }

    public function hasDateRestriction()
    {
        return count($this->dateRestrictions) > 0;
    }

    public function hasDownloadCountRestriction()
    {
        return count($this->downloadCountRestrictions) > 0;
    }

    public function hasIpRestriction()
    {
        return count($this->ipRestrictions) > 0;
    }

    public function hasSecretRestriction()
    {
        return count($this->secretRestrictions) > 0;
    }

    public function hasUserRestriction()
    {
        return count($this->userRestrictions) > 0;
    }
}
