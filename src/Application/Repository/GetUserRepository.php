<?php

declare(strict_types=1);

namespace App\Application\Repository;

use App\Application\Query\ViewModel\UserDTO;
use Ramsey\Uuid\UuidInterface;

interface GetUserRepository
{
    public function getById(UuidInterface $id): UserDTO;

    /**
     * @return UserDTO[]
     */
    public function getAll(): iterable;
}
