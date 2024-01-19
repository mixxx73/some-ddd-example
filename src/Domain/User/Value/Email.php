<?php

declare(strict_types=1);

namespace App\Domain\User\Value;

use App\Domain\User\Exception\InvalidEmail;

class Email
{
    private const MAXIMUM_LENGTH = 100;

    public function __construct(
        public string $email,
    ) {
        if (\strlen($email) > self::MAXIMUM_LENGTH) {
            throw InvalidEmail::lengthRequirement(self::MAXIMUM_LENGTH);
        }
    }
}
