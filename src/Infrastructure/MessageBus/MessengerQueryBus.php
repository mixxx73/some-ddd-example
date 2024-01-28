<?php

declare(strict_types=1);

namespace App\Infrastructure\MessageBus;

use App\Application\MessageBus\QueryBus;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class MessengerQueryBus implements QueryBus
{
    public function __construct(
        private MessageBusInterface $messageBus,
    ) {
    }

    public function query($query): mixed
    {
        $envelope = $this->messageBus->dispatch(
            $query instanceof Envelope ? $query : new Envelope($query),
        );

        return $envelope->last(HandledStamp::class)->getResult();
    }
}
