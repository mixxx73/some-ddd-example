<?php

declare(strict_types=1);

namespace App\Application\Query\ViewModel;

class UserDTO
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly ?string $description,
        public readonly string $email,
    ) {
    }
}
