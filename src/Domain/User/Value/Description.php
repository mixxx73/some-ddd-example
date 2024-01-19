<?php

declare(strict_types=1);

namespace App\Domain\User\Value;

use App\Domain\User\Exception\InvalidDescription;

class Description
{
    private const MAXIMUM_LENGTH = 4096;

    public function __construct(
        public ?string $description = null,
    ) {
        if ($this->description === null) {
            return;
        }

        if (\strlen($description) > self::MAXIMUM_LENGTH) {
            throw InvalidDescription::lengthRequirement(self::MAXIMUM_LENGTH);
        }
    }
}
