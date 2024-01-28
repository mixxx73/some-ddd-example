<?php

declare(strict_types=1);

namespace App\UI\Queue\Message;

use Ramsey\Uuid\UuidInterface;

class UserArrived
{
    /**
     * This can translate a message from an external queue.
     */
    public function __construct(public UuidInterface $roleId)
    {
    }
}
