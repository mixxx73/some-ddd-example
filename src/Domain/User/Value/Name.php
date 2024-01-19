<?php

declare(strict_types=1);

namespace App\Domain\User\Value;

use App\Domain\User\Exception\InvalidName;

class Name
{
    private const MAXIMUM_LENGTH = 100;

    public function __construct(
        public string $name,
    ) {
        if (\strlen($name) > self::MAXIMUM_LENGTH) {
            throw InvalidName::lengthRequirement(self::MAXIMUM_LENGTH);
        }
    }
}
