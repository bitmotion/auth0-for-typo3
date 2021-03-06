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

namespace Bitmotion\Auth0\Domain\Model\Auth0\Management;

class Stat
{
    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @var int
     */
    protected $logins;

    /**
     * @var int
     */
    protected $signups;

    /**
     * @var int
     */
    protected $leakedPasswords;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getLogins()
    {
        return $this->logins;
    }

    public function setLogins(int $logins): void
    {
        $this->logins = $logins;
    }

    /**
     * @return int
     */
    public function getSignups()
    {
        return $this->signups;
    }

    public function setSignups(int $signups): void
    {
        $this->signups = $signups;
    }

    /**
     * @return int
     */
    public function getLeakedPasswords()
    {
        return $this->leakedPasswords;
    }

    public function setLeakedPasswords(int $leakedPasswords): void
    {
        $this->leakedPasswords = $leakedPasswords;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
