<?php

namespace Chm\Bundle\DocumentBundle\Entity;

/**
 * DownloadCountRestriction
 */
class DownloadCountRestriction
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $limit;

    /**
     * @var boolean
     */
    private $failureCount;

    /**
     * @var boolean
     */
    private $successCount;

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
     * Set limit
     *
     * @param  integer                  $limit
     * @return DownloadCountRestriction
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * Get limit
     *
     * @return integer
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Set failureCount
     *
     * @param  boolean                  $failureCount
     * @return DownloadCountRestriction
     */
    public function setFailureCount($failureCount)
    {
        $this->failureCount = $failureCount;

        return $this;
    }

    /**
     * Get failureCount
     *
     * @return boolean
     */
    public function getFailureCount()
    {
        return $this->failureCount;
    }

    /**
     * Set successCount
     *
     * @param  boolean                  $successCount
     * @return DownloadCountRestriction
     */
    public function setSuccessCount($successCount)
    {
        $this->successCount = $successCount;

        return $this;
    }

    /**
     * Get successCount
     *
     * @return boolean
     */
    public function getSuccessCount()
    {
        return $this->successCount;
    }

    /**
     * Set comment
     *
     * @param  string                   $comment
     * @return DownloadCountRestriction
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
     * @return DownloadCountRestriction
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
}
