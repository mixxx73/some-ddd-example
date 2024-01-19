<?php

declare(strict_types=1);

namespace App\Application\Query;

use App\Application\Query\ViewModel\UserDTO;
use App\Application\Repository\GetUserRepository;

class GetUsersListHandler
{
    public function __construct(
        private readonly GetUserRepository $repository,
    ) {
    }

    /**
     * @return UserDTO[]
     */
    public function __invoke(GetUsersList $query): iterable
    {
        return $this->repository->getAll();
    }
}
