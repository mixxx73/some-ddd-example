<?php

declare(strict_types=1);

namespace App\UI\Http;

use App\Application\MessageBus\QueryBus;
use App\Application\Query\GetUser;
use App\Application\Query\ViewModel\UserDTO;
use App\UI\Http\Response\GetUserResponse;
use Ramsey\Uuid\Uuid;

class GetUserController
{
    public function __construct(private readonly QueryBus $queryBus)
    {
    }

    public function __invoke(string $id): GetUserResponse
    {
        /** @var UserDTO $user */
        $user = $this->queryBus->query(new GetUser(Uuid::fromString($id)));

        return GetUserResponse::fromUserDTO($user);
    }
}
