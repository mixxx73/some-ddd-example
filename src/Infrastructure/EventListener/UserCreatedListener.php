<?php

declare(strict_types=1);

namespace App\Infrastructure\EventListener;

use App\Domain\User\Event\UserCreated;
use App\Infrastructure\Event\EventStoreMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler]
class UserCreatedListener
{
    public function __construct(
        private readonly MessageBusInterface $messageBus,
    ) {
    }

    public function __invoke(UserCreated $userCreated): void
    {
        $this->messageBus->dispatch(
            EventStoreMessage::create(
                UserCreated::EVENT_NAME,
                [
                    'id' => $userCreated->id,
                    'name' => $userCreated->name,
                    'description' => $userCreated->description,
                    'email' => $userCreated->email,
                ],
            ),
        );
    }
}
