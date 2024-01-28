<?php

declare(strict_types=1);

namespace App\Domain\User\Value;

use App\Domain\User\Exception\InvalidName;
use Symfony\Component\Validator\Constraints as Validators;
use Symfony\Component\Validator\Validation;

class Name
{
    private const MAXIMUM_LENGTH = 100;

    public function __construct(
        public string $name,
    ) {
        $validator = Validation::createValidator();
        $violations = $validator->validate($this->name, [
            new Validators\Length(['max' => self::MAXIMUM_LENGTH]),
            new Validators\NotBlank(),
        ]);
        if (\count($violations) > 0) {
            throw InvalidName::lengthRequirement(self::MAXIMUM_LENGTH);
        }
    }
}
