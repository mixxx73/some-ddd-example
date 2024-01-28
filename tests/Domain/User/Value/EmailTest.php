<?php

namespace App\Tests\Domain\User\Value;

use App\Domain\User\Exception\InvalidEmail;
use App\Domain\User\Value\Email;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class EmailTest extends KernelTestCase
{

    public function testToLongEmailThrowsException()
    {
        $this->expectException(InvalidEmail::class);
        $this->expectExceptionMessage('maximum email length required: 255');
        new Email(str_repeat('ok', 130));
    }


    public function testInvalidEmailThrowsException()
    {
        $this->expectException(InvalidEmail::class);
        $this->expectExceptionMessage('valid email format required');
        new Email(str_repeat('ok', 10));
    }

    public function testEmailValueObjectCanBeCreated()
    {
        $email = new Email('test@ok.pl');
        $this->assertSame('test@ok.pl', $email->email);
    }
}