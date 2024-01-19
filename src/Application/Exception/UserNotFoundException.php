<?php

declare(strict_types=1);

namespace App\Application\Exception;

class UserNotFoundException extends \Exception
{
    public static function fromId(string $id): self
    {
        return new self(\sprintf('No user found with id: %s', $id));
    }
}
