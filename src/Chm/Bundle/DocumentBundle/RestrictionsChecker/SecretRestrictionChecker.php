<?php
namespace Chm\Bundle\DocumentBundle\RestrictionsChecker;

use Psr\Log\LoggerInterface;
use Chm\Bundle\DocumentBundle\Entity\RestrictionInterface;
use Symfony\Component\HttpFoundation\Request;

class SecretRestrictionChecker extends AbstractRestrictionChecker
{
    /**
     * @var Logger
     */
    private $logger;
    /**
     * @var Request
     */
    private $request;

    public function __construct (LoggerInterface $logger, Request $request)
    {
        $this->logger = $logger;
        $this->request = $request;
    }

    /**
     * Checks if the given restriction is fulfilled by the current request
     *
     * @param UserRestriction The UserRestriction to be checked
     * @return boolean true on success else false
     */
    public function check(RestrictionInterface $restriction)
    {
        $requiredSecret = $restriction->getSecret();
        $postedSecret = $this->getPostedSecret();
        $this->logger->debug("Secret restriction check : is provided secret |$postedSecret| allowed by restriction on secret |$requiredSecret|");
        if ($postedSecret) {
            if ($requiredSecret === $postedSecret) {
                $this->logger->debug('  > YES');

                return true;
            } else {
                $this->logger->debug('  > NO (posted secret key is wrong)');

                return false;
            }
        }
        $this->logger->debug('  > NO (no posted secret key)');
        throw new SecretRequiredException();
    }

    private function getPostedSecret()
    {
        return $this->request->get('chm_bundle_documentbundle_document')['secret_key'];
    }
}
