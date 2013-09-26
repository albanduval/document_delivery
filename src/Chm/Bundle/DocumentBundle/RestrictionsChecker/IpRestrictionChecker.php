<?php
namespace Chm\Bundle\DocumentBundle\RestrictionsChecker;

use Chm\Bundle\DocumentBundle\Entity\IpRestriction;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\IpUtils;

/**
 * Check a single IP rule
 */
class IpRestrictionChecker
{
    /**
     * @var Logger
     */
    private $logger;
    /**
     * @var Request
     */
    private $request;

    public function __construct (Logger $logger, Request $request)
    {
        $this->logger = $logger;
        $this->request = $request;
    }
    /**
     * Checks if current request fits the IP restriction
     *
     * @return boolean returns true if the restriction has passed
     */
    public function check(IpRestriction $restriction)
    {
        $requestIp = $this->request->getClientIp();
        $allowedIps = $restriction->getIpAddress();

        $this->logger->debug("IP restriction check : is client IP |$requestIp| allowed by restriction on |$allowedIps|");

        $success = IpUtils::checkIp($requestIp, $allowedIps);

        $this->logger->debug( $success ? '  > YES' : '  > NO');

        return $success;
    }
}
