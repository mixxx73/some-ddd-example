<?php

declare(strict_types=1);

namespace App\Domain\User\Value;

use App\Domain\User\Exception\InvalidEmail;
use Symfony\Component\Validator\Constraints as Validators;
use Symfony\Component\Validator\Validation;

class Email
{
    private const MAXIMUM_LENGTH = 255;

    public function __construct(
        public string $email,
    ) {
        $validator = Validation::createValidator();
        $violations = $validator->validate($this->email, [
            new Validators\Length(['max' => 255]),
            new Validators\NotBlank(),
        ]);

        if (\count($violations) > 0) {
            throw InvalidEmail::lengthRequirement(self::MAXIMUM_LENGTH);
        }

        $validator = Validation::createValidator();
        $violations = $validator->validate($this->email, [
            new Validators\Email(),
        ]);

        if (\count($violations) > 0) {
            throw InvalidEmail::validEmailRequirement();
        }
    }
}
