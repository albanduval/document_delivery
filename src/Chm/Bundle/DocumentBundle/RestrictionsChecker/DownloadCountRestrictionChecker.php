<?php
namespace Chm\Bundle\DocumentBundle\RestrictionsChecker;

use Psr\Log\LoggerInterface;
use Chm\Bundle\DocumentBundle\Entity\RestrictionInterface;

class DownloadCountRestrictionChecker extends AbstractRestrictionChecker
{
    /**
     * Logger
     *
     * @var
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Checks if the given restriction is fulfilled by the current request
     *
     * @param UserRestriction The UserRestriction to be checked
     * @return boolean true on success else false
     */
    public function check(RestrictionInterface $restriction)
    {
        throw new \Symfony\Component\Intl\Exception\MethodNotImplementedException(__METHOD__);
    }
}
