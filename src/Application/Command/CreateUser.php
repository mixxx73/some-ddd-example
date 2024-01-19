<?php

declare(strict_types=1);

namespace App\Application\Command;

use Ramsey\Uuid\UuidInterface;

final readonly class CreateUser
{
    public function __construct(
        public readonly UuidInterface $id,
        public readonly UuidInterface $roleId,
        public readonly string $name,
        public readonly string $description,
        public readonly string $email,
    ) {
    }
}
