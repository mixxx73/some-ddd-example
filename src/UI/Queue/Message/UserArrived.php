<?php

declare(strict_types=1);

namespace App\UI\Queue\Message;

use Ramsey\Uuid\UuidInterface;

class UserArrived
{
    /**
     * Here we translate from an external queue.
     */
    public function __construct(public UuidInterface $roleId)
    {
    }
}
