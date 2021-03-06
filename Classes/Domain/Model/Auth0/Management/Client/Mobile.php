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

namespace Bitmotion\Auth0\Domain\Model\Auth0\Management\Client;

class Mobile
{
    /**
     * Configuration related to Android native apps
     *
     * @var array
     */
    protected $android;

    /**
     * Configuration related to iOS native apps
     *
     * @var array
     */
    protected $ios;

    /**
     * @return array
     */
    public function getAndroid()
    {
        return $this->android;
    }

    public function setAndroid(array $android): void
    {
        $this->android = $android;
    }

    /**
     * @return array
     */
    public function getIos()
    {
        return $this->ios;
    }

    public function setIos(array $ios): void
    {
        $this->ios = $ios;
    }
}
