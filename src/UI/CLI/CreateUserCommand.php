<?php

declare(strict_types=1);

namespace App\UI\CLI;

use App\Application\Command\CreateUser;
use App\Application\MessageBus\CommandBus;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CreateUserCommand extends Command
{
    protected static $defaultName = 'app:create-user';
    protected static $defaultDescription = 'Here we give a description for command';

    public function __construct(private readonly CommandBus $commandBus)
    {
        parent::__construct(self::$defaultName);
    }

    protected function configure(): void
    {
        $this->setDescription(self::$defaultDescription);
        $this->addArgument('user-name', InputArgument::OPTIONAL, 'User name');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $this->commandBus->dispatch(
            new CreateUser(
                Uuid::uuid4(),
                Uuid::uuid4(),
                $input->getArgument('user-name') ?: 'User from CLI',
                \str_repeat('Some description ', 5),
                \sprintf('user-%s@cli.pl', \uniqid()),
            ),
        );

        $io->success('User has been created.');

        return Command::SUCCESS;
    }
}
