<?php

namespace App\Tests\Domain\User\Value;

use App\Domain\User\Exception\InvalidName;
use App\Domain\User\Value\Name;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class NameTest extends KernelTestCase
{

    public function testToLongNameThrowsException()
    {
        $this->expectException(InvalidName::class);
        $this->expectExceptionMessage('maximum name length required: 100');
        new Name(str_repeat('ok', 55));
    }


    public function testNameValueObjectCanBeCreated()
    {
        $name = new Name('test name');
        $this->assertSame('test name', $name->name);
    }
}