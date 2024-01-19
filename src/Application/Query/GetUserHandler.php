<?php

declare(strict_types=1);

namespace App\Application\Query;

use App\Application\Query\ViewModel\UserDTO;
use App\Application\Repository\GetUserRepository;

class GetUserHandler
{
    public function __construct(
        private readonly GetUserRepository $repository,
    ) {
    }

    public function __invoke(GetUser $query): UserDTO
    {
        return $this->repository->getById($query->id);
    }
}
