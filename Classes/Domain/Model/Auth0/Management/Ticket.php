<?php
declare(strict_types = 1);
namespace Bitmotion\Auth0\Domain\Model\Auth0\Management;

/***
 *
 * This file is part of the "Auth0" extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Florian Wessels <f.wessels@Leuchtfeuer.com>, Leuchtfeuer Digital Marketing
 *
 ***/

class Ticket
{
    /**
     * @var string
     */
    protected $ticket;

    /**
     * @return string
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    public function setTicket(string $ticket): void
    {
        $this->ticket = $ticket;
    }
}
