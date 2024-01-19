<?php declare(strict_types=1);

namespace App\UI\Http;

use Symfony\Component\HttpFoundation\JsonResponse;

final readonly class HealthCheckController
{

    public function __invoke(): JsonResponse
    {
        return new JsonResponse(['status' => 'ok']);
    }
}