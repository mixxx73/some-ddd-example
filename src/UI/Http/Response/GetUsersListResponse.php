<?php

declare(strict_types=1);

namespace App\UI\Http\Response;

use App\Application\Query\ViewModel\UserDTO;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetUsersListResponse extends JsonResponse
{
    /**
     * @param UserDTO[] $users
     */
    public static function fromUsersDTO(iterable $users): GetUsersListResponse
    {
        return new self([
            'data' => \array_map(
                static fn (UserDTO $user): array => [
                    'type' => 'users',
                    'id' => $user->id,
                    'attributes' => [
                        'name' => $user->name,
                        'email' => $user->email,
                    ],
                ],
                $users,
            ),
        ]);
    }
}
