<?php

declare(strict_types=1);

namespace App\UI\Http\Response;

use App\Application\Query\ViewModel\UserDTO;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetUserResponse extends JsonResponse
{
    public static function fromUserDTO(UserDTO $user): GetUserResponse
    {
        return new self([
            'data' => [
                'type' => 'users',
                'id' => $user->id,
                'attributes' => [
                    'name' => $user->name,
                    'description' => $user->description,
                    'email' => $user->email,
                ],
            ],
        ]);
    }
}
