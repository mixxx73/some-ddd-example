<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Application\Repository\UserRepository;
use App\Domain\User\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineUserRepository extends ServiceEntityRepository implements UserRepository
{
    public function __construct(ManagerRegistry $manager)
    {
        parent::__construct($manager, User::class);
    }

    public function add(User $user): void
    {
        $this->_em->persist($user);
        $this->_em->flush();
    }
}
