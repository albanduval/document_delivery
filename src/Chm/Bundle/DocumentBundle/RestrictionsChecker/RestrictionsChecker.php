<?php
namespace Chm\Bundle\DocumentBundle\RestrictionsChecker;

class RestrictionsChecker
{

    /**
     * @var SuperUserContextChecker
     */
    private $superUserContextChecker;

    /**
     * @var OnwerChecker
     */
    private $ownerDocumentChecker;

    /**
     * @var DateRestrictionChecker
     */
    private $dateRestrictionChecker;

    /**
     * @var IpRestrictionChecker
     */
    private $ipRestrictionChecker;

    /**
     * @var DownloadCountRestrictionChecker
     */
    private $downloadCountRestrictionChecker;

    /**
     * @var SecretRestrictionChecker
     */
    private $secretRestrictionChecker;

    /**
     * @var UserRestrictionChecker
     */
    private $userRestrictionChecker;

    public function __construct(SuperUserContextChecker $superUserContextChecker, OwnerDocumentChecker $ownerDocumentChecker, DateRestrictionChecker $dateRestrictionChecker, IpRestrictionChecker $ipRestrictionChecker, DownloadCountRestrictionChecker $downloadCountRestrictionChecker, SecretRestrictionChecker $secretRestrictionChecker, UserRestrictionChecker $userRestrictionChecker )
    {
        // context checkers not depending on what is to be downloaded
        $this->superUserContextChecker = $superUserContextChecker;

        // document checker, depending on main document properties
        $this->ownerDocumentChecker = $ownerDocumentChecker;

        // restrictions checkers, depending on various restrictions defined by document
        $this->dateRestrictionChecker          = $dateRestrictionChecker;
        $this->ipRestrictionChecker            = $ipRestrictionChecker;
        $this->downloadCountRestrictionChecker = $downloadCountRestrictionChecker;
        $this->secretRestrictionChecker        = $secretRestrictionChecker;
        $this->userRestrictionChecker          = $userRestrictionChecker;
    }

    /**
     * Check if current request fits the document restrictions
     *
     * @throws SkipRestrictionsCheckException
     * @return boolean                        wether the document can be downloaded or not
     */
    public function check($document)
    {
        // if super user, it's open bar !
        if ($this->superUserContextChecker->check($document)) {
            // no log and return success
            throw new SkipRestrictionsCheckException();
        }
        // if the current user is the document owner
        if ($this->ownerDocumentChecker->check($document)) {
            // no log and return success
            throw new SkipRestrictionsCheckException();
        }

        // if at least one restriction of each existing type is fullfilled
        if (
            $this->checkRestrictionsCollection($this->dateRestrictionChecker, $document->getDateRestrictions())
            && $this->checkRestrictionsCollection($this->ipRestrictionChecker, $document->getIpRestrictions())
            && $this->checkRestrictionsCollection($this->userRestrictionChecker, $document->getUserRestrictions())
            && $this->checkRestrictionsCollection($this->secretRestrictionChecker, $document->getSecretRestrictions())
            && $this->checkRestrictionsCollection($this->downloadCountRestrictionChecker, $document->getDownloadCountRestrictions())
            ) {
            // return true
            return true;
        }

        // return false
        return false;
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
