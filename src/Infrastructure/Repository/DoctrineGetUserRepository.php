<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Application\Exception\UserNotFoundException;
use App\Application\Query\ViewModel\UserDTO;
use App\Application\Repository\GetUserRepository;
use App\Domain\User\User;
use App\Domain\User\Value\Description;
use App\Domain\User\Value\Email;
use App\Domain\User\Value\Name;
use Doctrine\ORM\EntityManagerInterface;
use Ramsey\Uuid\UuidInterface;

class DoctrineGetUserRepository implements GetUserRepository
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    public function getById(UuidInterface $id): UserDTO
    {
        $users = $this->entityManager->createQueryBuilder()
            ->from(User::class, 'u')
            ->select('u.id, u.name, u.description, u.email')
            ->where('u.id = :id')->setParameter('id', $id->toString())
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();

        if (!$users || \count($users) !== 1) {
            throw UserNotFoundException::fromId($id->toString());
        }

        $user = $users[0];

        /** @var Name $name */
        $name = $user['name'];

        /** @var Description $description */
        $description = $user['description'];

        /** @var Email $email */
        $email = $user['email'];

        return new UserDTO(
            $user['id'],
            $name->name,
            $description->description,
            $email->email,
        );
    }

    /**
     * @return UserDTO[]
     */
    public function getAll(): iterable
    {
        $users = $this->entityManager->createQueryBuilder()
            ->from(User::class, 'u')
            ->select('u.id, u.name, u.email')
            ->setMaxResults(100)
            ->getQuery()
            ->getResult();

        return \array_map(
            static function (array $row): UserDTO {
                /** @var UuidInterface $id */
                $id = $row['id'];
                /** @var Name $name */
                $name = $row['name'];
                /** @var Email $email */
                $email = $row['email'];

                return new UserDTO(
                    $id->toString(),
                    $name->name,
                    null,
                    $email->email,
                );
            },
            $users,
        );
    }
}
