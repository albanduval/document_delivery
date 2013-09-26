<?php
namespace Chm\Bundle\DocumentBundle\RestrictionsChecker;

class RestrictionsChecker
{

    /**
     * @var IpRestrictionChecker
     */
    private $ipRestrictionChecker;

    /**
     * @var downloadCountRestrictionChecker
     */
    private $downloadCountRestrictionChecker;

    /**
     * @var secretRestrictionChecker
     */
    private $secretRestrictionChecker;

    /**
     * @var userRestrictionChecker
     */
    private $userRestrictionChecker;

    public function __construct(IpRestrictionChecker $ipRestrictionChecker, DownloadCountRestrictionChecker $downloadCountRestrictionChecker, SecretRestrictionChecker $secretRestrictionChecker, UserRestrictionChecker $userRestrictionChecker )
    {
        $this->ipRestrictionChecker = $ipRestrictionChecker;
        $this->downloadCountRestrictionChecker = $downloadCountRestrictionChecker;
        $this->secretRestrictionChecker = $secretRestrictionChecker;
        $this->userRestrictionChecker = $userRestrictionChecker;
    }

    /**
     * Check if current request fits the document restrictions
     *
     * @return boolean wether the document can be downloaded or not
     */
    public function check($document)
    {
        return
            $this->checkRestrictionsCollection($this->ipRestrictionChecker, $document->getIpRestrictions())
            && $this->checkRestrictionsCollection($this->userRestrictionChecker, $document->getUserRestrictions())
            && $this->checkRestrictionsCollection($this->secretRestrictionChecker, $document->getSecretRestrictions())
            && $this->checkRestrictionsCollection($this->downloadCountRestrictionChecker, $document->getDownloadCountRestrictions());
    }

    /**
     * Check if current request fits the document restrictions
     *
     * @return boolean true whene there are no restrictions or when at least one restriction is successfully passed
     */
    private function checkRestrictionsCollection($restrictionChecker, $restrictions)
    {
        // no restrictions => always success !
        if (count($restrictions) == 0) {
            return true;
        }

        $restrictionPassed = false;
        foreach ($restrictions as $restriction) {
            if ($restrictionChecker->check($restriction)) {
                // if at least one restriction passes, no need to check more
                return true;
            }
        }

        return false;
    }
}
