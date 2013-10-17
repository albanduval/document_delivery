<?php

namespace Chm\Bundle\DocumentBundle\Entity;

/**
 * IpRestriction
 */
class IpRestriction implements RestrictionInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $ipAddress;

    /**
     * @var string
     */
    private $netmask;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var \Chm\Bundle\DocumentBundle\Entity\Document
     */
    private $document;

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
     * Set ipAddress
     *
     * @param  string        $ipAddress
     * @return IpRestriction
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Set netmask
     *
     * @param  string        $netmask
     * @return IpRestriction
     */
    public function setNetmask($netmask)
    {
        $this->netmask = $netmask;

        return $this;
    }

    /**
     * Get netmask
     *
     * @return string
     */
    public function getNetmask()
    {
        return $this->netmask;
    }

    /**
     * Set comment
     *
     * @param  string        $comment
     * @return IpRestriction
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
     * @return IpRestriction
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
     * @param  integer       $id
     * @return IpRestriction
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
