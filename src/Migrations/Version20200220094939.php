<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200220094939 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE employee ADD matricule VARCHAR(255) NOT NULL, ADD lastname VARCHAR(255) NOT NULL, ADD firstname VARCHAR(255) NOT NULL, ADD address VARCHAR(255) NOT NULL, ADD number VARCHAR(255) NOT NULL, ADD salary INT NOT NULL, ADD date_of_taking_office DATE NOT NULL, ADD duration_of_contract INT NOT NULL, ADD type_of_contract VARCHAR(255) NOT NULL, ADD created_at DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE employee DROP matricule, DROP lastname, DROP firstname, DROP address, DROP number, DROP salary, DROP date_of_taking_office, DROP duration_of_contract, DROP type_of_contract, DROP created_at');
    }
}
