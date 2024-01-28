<?php

declare(strict_types=1);

namespace App\Domain\User;

use App\Domain\User\Value\Description;
use App\Domain\User\Value\Email;
use App\Domain\User\Value\Name;
use Ramsey\Uuid\UuidInterface;

class User
{
    public function __construct(
        private UuidInterface $id,
        private UuidInterface $roleId,
        private Name $name,
        private Description $description,
        private Email $email,
    ) {
    }

    public static function create(
        UuidInterface $id,
        UuidInterface $categoryId,
        Name $name,
        Description $description,
        Email $email,
    ): self {
        return new self($id, $categoryId, $name, $description, $email);
    }

    public function rename($name): self
    {
        $this->name = $name;

        return $this;
    }
}
