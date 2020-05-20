<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200220091423 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE depenses (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, amount INT NOT NULL, date_depense DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depenses_type_depense (depenses_id INT NOT NULL, type_depense_id INT NOT NULL, INDEX IDX_25769896338B55D2 (depenses_id), INDEX IDX_257698965CDBC346 (type_depense_id), PRIMARY KEY(depenses_id, type_depense_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depenses_employee (depenses_id INT NOT NULL, employee_id INT NOT NULL, INDEX IDX_8A524F61338B55D2 (depenses_id), INDEX IDX_8A524F618C03F15C (employee_id), PRIMARY KEY(depenses_id, employee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE depenses_type_depense ADD CONSTRAINT FK_25769896338B55D2 FOREIGN KEY (depenses_id) REFERENCES depenses (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE depenses_type_depense ADD CONSTRAINT FK_257698965CDBC346 FOREIGN KEY (type_depense_id) REFERENCES type_depense (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE depenses_employee ADD CONSTRAINT FK_8A524F61338B55D2 FOREIGN KEY (depenses_id) REFERENCES depenses (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE depenses_employee ADD CONSTRAINT FK_8A524F618C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE depenses_type_depense DROP FOREIGN KEY FK_25769896338B55D2');
        $this->addSql('ALTER TABLE depenses_employee DROP FOREIGN KEY FK_8A524F61338B55D2');
        $this->addSql('ALTER TABLE depenses_employee DROP FOREIGN KEY FK_8A524F618C03F15C');
        $this->addSql('DROP TABLE depenses');
        $this->addSql('DROP TABLE depenses_type_depense');
        $this->addSql('DROP TABLE depenses_employee');
        $this->addSql('DROP TABLE employee');
    }
}
