<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine;

use App\Domain\User\Value\Email;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

class EmailType extends StringType
{
    public function convertToPHPValue($value, AbstractPlatform $platform): Email
    {
        return new Email($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        return $value instanceof Email ? $value->email : null;
    }

    public function getName(): string
    {
        return 'email';
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }
}
