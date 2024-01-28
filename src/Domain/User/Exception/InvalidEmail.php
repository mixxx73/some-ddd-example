<?php

declare(strict_types=1);

namespace App\Domain\User\Exception;

class InvalidEmail extends \Exception
{
    public static function lengthRequirement(int $length): self
    {
        return new self(\sprintf('maximum email length required: %d', $length));
    }

    public static function validEmailRequirement(): self
    {
        return new self('valid email format required');
    }
}
