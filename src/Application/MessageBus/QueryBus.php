<?php

declare(strict_types=1);

namespace App\Application\MessageBus;

interface QueryBus
{
    public function query($query);
}
