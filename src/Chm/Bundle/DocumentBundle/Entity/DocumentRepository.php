<?php

namespace Chm\Bundle\DocumentBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Document
 */
class DocumentRepository extends EntityRepository
{

    /**
     */
    public function findAllowedForUser($user)
    {
        if (is_object($user)) {
            $userId = $user->getId();
        } elseif (is_int($user)) {
            $userId = $user;
        } else {
            $userId = null;
        }

        return $this->getEntityManager()
                    ->createQuery('
                        SELECT d
                        FROM
                            ChmDocumentBundle:Document d
                            LEFT JOIN d.userRestrictions ur
                        WHERE
                            ur.user = :user_id
                        ORDER BY
                            d.createdAt DESC
                        ')
                    ->setParameter('user_id', $userId)
                    ->getResult();
    }
}
