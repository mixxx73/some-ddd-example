<?php

declare(strict_types=1);

namespace App\Domain\User\Exception;

class InvalidDescription extends \Exception
{
    public static function lengthRequirement(int $length): self
    {
        return new self(\sprintf('maximum description length required: %d', $length));
    }
}
