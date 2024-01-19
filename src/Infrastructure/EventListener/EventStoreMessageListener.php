<?php

declare(strict_types=1);

namespace App\Infrastructure\EventListener;

use App\Infrastructure\Event\EventStoreMessage;

class EventStoreMessageListener
{
    public function __construct()
    {
    }

    public function __invoke(EventStoreMessage $eventStoreMessage): void
    {
    }
}
