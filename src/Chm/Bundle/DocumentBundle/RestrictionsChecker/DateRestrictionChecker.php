<?php
namespace Chm\Bundle\DocumentBundle\RestrictionsChecker;

use Psr\Log\LoggerInterface;
use Chm\Bundle\DocumentBundle\Entity\RestrictionInterface;

class DateRestrictionChecker extends AbstractRestrictionChecker
{
    /**
     * @var Logger
     */
    private $logger;

    public function __construct (LoggerInterface $logger)
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
        $dateFormat = 'Y-m-d H:i:s';
        $currentTime = new \DateTime();
        $fromDate = $restriction->getFromDate();
        $formattedFromDate = ($fromDate) ? $fromDate->format($dateFormat) : 'beginning of time';
        $toDate = $restriction->getToDate();
        $formattedToDate = ($toDate) ? $toDate->format($dateFormat) : 'end of time';
        $this->logger->debug('Date restriction check : is current time ' . $currentTime->format($dateFormat) . ' allowed by restriction on date from ' . $formattedFromDate . ' to ' . $formattedToDate . ' ?');

        // check "from" date (no "from" date means the beginning of time => always OK !)
        if ($fromDate) {
            if ($currentTime < $fromDate) {
                $this->logger->debug('  > NO (current date before "from" date)');

                return false;
            }
        }

        // check "to" date (no "to" date means the end of time => always OK !)
        if ($toDate) {
            if ($currentTime > $toDate) {
                $this->logger->debug('  > NO (current date after "to" date)');

                return false;
            }
        }

        $this->logger->debug('  > YES');

        return true;
    }
}
