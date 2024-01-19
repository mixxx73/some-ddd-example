<?php

declare(strict_types=1);

namespace App\UI\Http;

use App\Application\Command\CreateUser;
use App\Application\MessageBus\CommandBus;
use App\UI\Http\Request\CreateUserRequest;
use App\UI\Http\Response\CreateUserResponse;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;

final readonly class CreateUserController
{
    public function __construct(private readonly CommandBus $commandBus)
    {
    }

    public function __invoke(
        #[MapRequestPayload(acceptFormat: 'json')] CreateUserRequest $createUserRequest,
    ): CreateUserResponse {
        $command = new CreateUser(
            Uuid::fromString($createUserRequest->id),
            Uuid::fromString($createUserRequest->roleId),
            $createUserRequest->name,
            $createUserRequest->description,
            $createUserRequest->email,
        );

        $this->commandBus->dispatch($command);

        return CreateUserResponse::fromCommand($command);
    }
}
