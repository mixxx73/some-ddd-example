<?php

namespace App\Tests\Domain\User\Value;

use App\Domain\User\Exception\InvalidDescription;
use App\Domain\User\Value\Description;
use App\Domain\User\Value\Name;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DescriptionTest extends KernelTestCase
{
    public function testInvalidDescriptionThrowsException()
    {
        $this->expectException(InvalidDescription::class);
        $this->expectExceptionMessage('maximum description length required: 4096');
        new Description(str_repeat('ok', 2500));
    }

    public function testDescriptionValueObjectCanBeCreated()
    {
        $description = new Description(null);
        $this->assertNull($description->description);

        $description = new Description('test description');
        $this->assertSame('test description', $description->description);
    }

}