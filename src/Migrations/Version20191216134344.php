<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191216134344 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE entreprise CHANGE nom nom VARCHAR(30) NOT NULL, CHANGE adresse adresse VARCHAR(60) NOT NULL, CHANGE tel tel VARCHAR(10) NOT NULL, CHANGE lien_site lien_site VARCHAR(60) DEFAULT NULL');
        $this->addSql('ALTER TABLE stage CHANGE titre titre VARCHAR(40) NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE date_parution date_parution DATE NOT NULL, CHANGE contact contact VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE formation DROP description, CHANGE type type VARCHAR(40) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE entreprise CHANGE nom nom INT NOT NULL, CHANGE adresse adresse VARCHAR(70) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tel tel VARCHAR(80) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lien_site lien_site VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE formation ADD description VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE type type INT NOT NULL');
        $this->addSql('ALTER TABLE stage CHANGE titre titre INT NOT NULL, CHANGE description description VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_parution date_parution LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE contact contact DATE NOT NULL');
    }
}
