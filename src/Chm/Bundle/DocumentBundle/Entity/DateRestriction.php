<?php

namespace Chm\Bundle\DocumentBundle\Entity;

/**
 * DateRestriction
 */
class DateRestriction implements RestrictionInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var DateTime
     */
    private $fromDate;

    /**
     * @var DateTime
     */
    private $toDate;

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
     * Set fromDate
     *
     * @param  DateTime        $fromDate
     * @return DateRestriction
     */
    public function setFromDate($fromDate)
    {
        $this->fromDate = $fromDate;

        return $this;
    }

    /**
     * Get fromDate
     *
     * @return DateTime
     */
    public function getFromDate()
    {
        return $this->fromDate;
    }

    /**
     * Set toDate
     *
     * @param  DateTime        $toDate
     * @return DateRestriction
     */
    public function setToDate($toDate)
    {
        $this->toDate = $toDate;

        return $this;
    }

    /**
     * Get toDate
     *
     * @return DateTime
     */
    public function getToDate()
    {
        return $this->toDate;
    }

    /**
     * Set comment
     *
     * @param  string          $comment
     * @return DateRestriction
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
     * @return DateRestriction
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
     * @param  integer         $id
     * @return DateRestriction
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
