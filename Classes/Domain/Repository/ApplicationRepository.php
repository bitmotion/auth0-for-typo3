<?php

declare(strict_types=1);

/*
 * This file is part of the "Auth0" extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * Florian Wessels <f.wessels@Leuchtfeuer.com>, Leuchtfeuer Digital Marketing
 */

namespace Bitmotion\Auth0\Domain\Repository;

use Bitmotion\Auth0\Domain\Model\Application;
use Bitmotion\Auth0\Exception\InvalidApplicationException;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;

class ApplicationRepository implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    const TABLE_NAME = 'tx_auth0_domain_model_application';

    /**
     * @throws InvalidApplicationException
     *
     * @return Application|array
     */
    public function findByUid(int $uid, bool $asObject = false)
    {
        if ($asObject === true) {
            return GeneralUtility::makeInstance(ObjectManager::class)
                                 ->get(PersistenceManager::class)
                                 ->getObjectByIdentifier($uid, Application::class);
        }
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable(self::TABLE_NAME);
        $queryBuilder
                ->select('*')
                ->from('tx_auth0_domain_model_application')
                ->where($queryBuilder->expr()->eq('uid', $queryBuilder->createNamedParameter($uid, \PDO::PARAM_INT)));

        $this->logger->debug(
            sprintf('[%s] Executed SELECT query: %s', 'tx_auth0_domain_model_application', $queryBuilder->getSQL())
        );

        $application = $queryBuilder->execute()->fetch();

        trigger_error('Retrieving application as array is deprecated and will be removed in the next major version.', E_USER_DEPRECATED);

        if (!empty($application)) {
            return $application;
        }

        throw new InvalidApplicationException(sprintf('No Application found for given id %s', $uid), 1526046354);
    }

    public function findAll(): array
    {
        return GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable(self::TABLE_NAME)
            ->select('*')
            ->from(self::TABLE_NAME)
            ->execute()
            ->fetchAll();
    }

    public function remove(Application $application): void
    {
        $qb = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable(self::TABLE_NAME);

        $qb->delete(self::TABLE_NAME)->where(
            $qb->expr()->eq('uid', $qb->createNamedParameter($application->getUid(), \PDO::PARAM_INT))
        )->execute();
    }
}
