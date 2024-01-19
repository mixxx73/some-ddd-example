<?php

declare(strict_types=1);

namespace App\Application\Query;

use Ramsey\Uuid\UuidInterface;

class GetUser
{
    public function __construct(
        public readonly UuidInterface $id,
    ) {
    }
}
