<?php

declare(strict_types=1);

namespace App\Domain\User\Exception;

class InvalidName extends \Exception
{
    public static function lengthRequirement(int $length): self
    {
        return new self(\sprintf('maximum name length required: %d', $length));
    }
}
