<?php
namespace Chm\Bundle\DocumentBundle\RestrictionsChecker;

use Psr\Log\LoggerInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Chm\Bundle\DocumentBundle\Entity\Document;

class OwnerDocumentChecker
{
    /**
     * Logger
     *
     * @var
     */
    private $logger;

    /**
     * Security context service
     *
     * @var
     */
    private $security_context;

    public function __construct(LoggerInterface $logger, SecurityContextInterface $security_context)
    {
        $this->logger = $logger;
        $this->security_context = $security_context;
    }

    /**
     * Checks if the given restriction is fulfilled by the current request
     *
     * @param UserRestriction The UserRestriction to be checked
     * @return boolean true on success else false
     */
    public function check(Document $document)
    {
        $this->logger->debug('Owner restriction check : is current user the owner of doc #' . $document->getId() . ' ?');

        if (!is_object($this->getUser())) {
            $this->logger->debug('  > NO (no authenticated user)');

            return false;
        }

        // allow download for all admins
        if ($this->getUser()->getId() === $document->getCreatedBy()->getId()) {
            $this->logger->debug('  > YES - owner is #' . $this->getUser()->getId());

            return true;
        }

        $this->logger->debug('  > NO');

        return false;
    }

    /**
     * Get a user from the Security Context
     *
     * @return mixed
     *
     * @throws \LogicException If Security Context is not available
     *
     * @see Symfony\Component\Security\Core\Authentication\Token\TokenInterface::getUser()
     */
    public function getUser()
    {
        if (!$this->security_context) {
            throw new \LogicException('The SecurityBundle is not registered in your application.');
        }

        if (null === $token = $this->security_context->getToken()) {
            return null;
        }

        if (!is_object($user = $token->getUser())) {
            return null;
        }

        return $user;
    }
}
