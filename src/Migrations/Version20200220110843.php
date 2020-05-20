<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200220110843 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE depenses ADD typedepense_id INT NOT NULL, ADD employee_id INT NOT NULL');
        $this->addSql('ALTER TABLE depenses ADD CONSTRAINT FK_EE350ECBB882F56E FOREIGN KEY (typedepense_id) REFERENCES type_depense (id)');
        $this->addSql('ALTER TABLE depenses ADD CONSTRAINT FK_EE350ECB8C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id)');
        $this->addSql('CREATE INDEX IDX_EE350ECBB882F56E ON depenses (typedepense_id)');
        $this->addSql('CREATE INDEX IDX_EE350ECB8C03F15C ON depenses (employee_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE depenses DROP FOREIGN KEY FK_EE350ECBB882F56E');
        $this->addSql('ALTER TABLE depenses DROP FOREIGN KEY FK_EE350ECB8C03F15C');
        $this->addSql('DROP INDEX IDX_EE350ECBB882F56E ON depenses');
        $this->addSql('DROP INDEX IDX_EE350ECB8C03F15C ON depenses');
        $this->addSql('ALTER TABLE depenses DROP typedepense_id, DROP employee_id');
    }
}
