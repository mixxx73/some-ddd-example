<?php

declare(strict_types=1);

namespace App\UI\Http\Request;

use Symfony\Component\Validator\Constraints as Assert;

class CreateUserRequest
{
    #[Assert\NotNull]
    public string $id;

    #[Assert\NotNull]
    public string $roleId;

    #[Assert\NotNull]
    #[Assert\Length(min: 2, max: 100)]
    public string $name;

    public string $description;

    #[Assert\NotNull]
    #[Assert\Email]
    #[Assert\Length(min: 2, max: 255)]
    public string $email;
}
