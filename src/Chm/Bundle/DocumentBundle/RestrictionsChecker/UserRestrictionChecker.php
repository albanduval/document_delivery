<?php
namespace Chm\Bundle\DocumentBundle\RestrictionsChecker;

use Psr\Log\LoggerInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Chm\Bundle\DocumentBundle\Entity\RestrictionInterface;

class UserRestrictionChecker extends AbstractRestrictionChecker
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
    public function check(RestrictionInterface $restriction)
    {
        $this->logger->debug('User restriction check : is user allowed by restriction on user #' . $restriction->getUser()->getId() . ' ?');

        if (!is_object($this->getUser())) {
            $this->logger->debug('  > NO (no authenticated user)');

            return false;
        }

        // allow download if the current user matches the restriction one
        if ($this->getUser()->getId() == $restriction->getUser()->getId()) {
            $this->logger->debug('  > YES');

            return true;
        }

        $this->logger->debug('  > NO (requested by user #' . $this->getUser()->getId() . ')');

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
