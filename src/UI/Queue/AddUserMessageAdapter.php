<?php

declare(strict_types=1);

namespace App\UI\Queue;

use App\Application\Command\CreateUser;
use App\UI\Queue\Message\UserArrived;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class AddUserMessageAdapter
{
    public function __construct(private readonly MessageBusInterface $commandBus)
    {
    }

    public function __invoke(UuidInterface $uuid): void
    {
        // @todo fix it
        $userArrived = new UserArrived($uuid);

        $this->commandBus->dispatch(
            new CreateUser(
                Uuid::uuid4(),
                $userArrived->roleId,
                'name',
                \str_repeat('From queue ', 10),
                'email@queue.pl',
            ),
        );
    }
}
