<?php

namespace Chm\Bundle\DocumentBundle\Entity;

/**
 * DocumentLocatorMessage
 */
class DocumentLocatorMessage
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $message;

    /**
     * @var boolean
     */
    private $success;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \Chm\Bundle\DocumentBundle\Entity\Document
     */
    private $document;

    /**
     * @var \Chm\Bundle\DocumentBundle\Entity\User
     */
    private $createdBy;

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
     * Set email
     *
     * @param  string                 $email
     * @return DocumentLocatorMessage
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set subject
     *
     * @param  string                 $subject
     * @return DocumentLocatorMessage
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set message
     *
     * @param  string                 $message
     * @return DocumentLocatorMessage
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set success
     *
     * @param  boolean                $success
     * @return DocumentLocatorMessage
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
     * Set createdAt
     *
     * @param  \DateTime              $createdAt
     * @return DocumentLocatorMessage
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
     * Set document
     *
     * @param  \Chm\Bundle\DocumentBundle\Entity\Document $document
     * @return DocumentLocatorMessage
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
     * Set createdBy
     *
     * @param  \Chm\Bundle\DocumentBundle\Entity\User $createdBy
     * @return DocumentLocatorMessage
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
     * make replacements in message according to given placeholders
     */
    public function replacePlaceHolders($placeholders)
    {
        // replace placeholders
        foreach ($placeholders as $search => $replace) {
            $this->message = str_replace($search, $replace, $this->message);
        }
    }

}
