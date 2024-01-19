<?php

declare(strict_types=1);

namespace App\Domain\User\Event;

class UserCreated
{
    public const EVENT_NAME = 'user-created';

    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $description,
        public readonly string $email,
    ) {
    }
}
