<?php

declare(strict_types=1);

namespace App\Application\Command;

use App\Application\Repository\UserRepository;
use App\Domain\User\Event\UserCreated;
use App\Domain\User\User;
use App\Domain\User\Value\Description;
use App\Domain\User\Value\Email;
use App\Domain\User\Value\Name;
use Symfony\Component\Messenger\MessageBusInterface;

class CreateUserHandler
{
    public function __construct(
        private readonly UserRepository $users,
        private readonly MessageBusInterface $messageBus,
    ) {
    }

    public function __invoke(CreateUser $command): void
    {
        $user = User::create(
            $command->id,
            $command->roleId,
            new Name($command->name),
            new Description($command->description),
            new Email($command->email),
        );

        $this->users->add($user);

        $this->messageBus->dispatch(
            new UserCreated(
                $command->id->toString(),
                $command->name,
                $command->description,
                $command->email,
            ),
        );
    }
}
