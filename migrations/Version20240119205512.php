<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240119205512 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE "user" (id UUID NOT NULL, role_id UUID NOT NULL, name VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN "user".id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN "user".role_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN "user".name IS \'(DC2Type:name)\'');
        $this->addSql('COMMENT ON COLUMN "user".description IS \'(DC2Type:description)\'');
        $this->addSql('COMMENT ON COLUMN "user".email IS \'(DC2Type:email)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE "user"');
    }
}
