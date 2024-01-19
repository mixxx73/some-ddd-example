<?php

declare(strict_types=1);

namespace App\UI\Http;

use App\Application\MessageBus\QueryBus;
use App\Application\Query\GetUsersList;
use App\Application\Query\ViewModel\UserDTO;
use App\UI\Http\Response\GetUsersListResponse;

class GetUsersListController
{
    public function __construct(private readonly QueryBus $queryBus)
    {
    }

    public function __invoke()
    {
        /** @var UserDTO[] $users */
        $users = $this->queryBus->query(new GetUsersList());

        return GetUsersListResponse::fromUsersDTO($users);
    }
}
