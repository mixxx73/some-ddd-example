<?php

declare(strict_types=1);

namespace App\UI\Http\Response;

use App\Application\Command\CreateUser;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CreateUserResponse extends JsonResponse
{
    public static function fromCommand(CreateUser $command): self
    {
        return new self(
            [
                'data' => [
                    'type' => 'users',
                    'id' => $command->id,
                    'attributes' => [
                        'name' => $command->name,
                        'description' => $command->description,
                        'email' => $command->email,
                    ],
                ],
            ],
            Response::HTTP_CREATED,
        );
    }
}
