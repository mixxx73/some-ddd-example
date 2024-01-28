<?php

namespace App\Tests\Domain\User;

use App\Domain\User\User;
use App\Domain\User\Value\Description;
use App\Domain\User\Value\Email;
use App\Domain\User\Value\Name;
use App\Tests\ReflectionHelper;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase
{
    public function testCreateDomainObject()
    {
        $user = new User(
            Uuid::fromString('c9e02964-0640-43ea-979c-f8ae4479152f'),
            Uuid::fromString('f68081bd-0137-4d1f-8974-bf989cf994c7'),
            new Name('some name'),
            new Description('some desc'),
            new Email('test@ok.pl'),
        );

        /** @var Name $actual */
        $actual = ReflectionHelper::getProperty($user, 'name');
        $this->assertSame((new Name('some name'))->name, $actual->name);
    }

    public function testRenameDomainObject()
    {
        $user = new User(
            Uuid::fromString('c9e02964-0640-43ea-979c-f8ae4479152f'),
            Uuid::fromString('f68081bd-0137-4d1f-8974-bf989cf994c7'),
            new Name('some name'),
            new Description('some desc'),
            new Email('test@ok.pl'),
        );

        $user->rename(new Name('some other name'));
        /** @var Name $actual */
        $actual = ReflectionHelper::getProperty($user, 'name');
        $this->assertSame((new Name('some other name'))->name, $actual->name);
    }
}
