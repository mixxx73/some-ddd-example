<?php

declare(strict_types=1);

namespace App\Domain\User\Value;

use App\Domain\User\Exception\InvalidDescription;
use Symfony\Component\Validator\Constraints as Validators;
use Symfony\Component\Validator\Validation;

class Description
{
    private const MAXIMUM_LENGTH = 4096;

    public function __construct(
        public ?string $description = null,
    ) {
        if ($this->description === null) {
            return;
        }

        $validator = Validation::createValidator();
        $violations = $validator->validate($this->description, [
            new Validators\Length(['max' => self::MAXIMUM_LENGTH]),
        ]);

        if (\count($violations) > 0) {
            throw InvalidDescription::lengthRequirement(self::MAXIMUM_LENGTH);
        }
    }
}
