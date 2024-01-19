<?php

declare(strict_types=1);

namespace App\Application\Repository;

use App\Domain\User\User;

interface UserRepository
{
    public function add(User $user): void;
}
