<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220507213055 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE membership DROP FOREIGN KEY FK_86FFD285D614C7E7');
        $this->addSql('ALTER TABLE membership DROP FOREIGN KEY FK_86FFD2854CE11AC2');
        $this->addSql('CREATE TABLE membership_type (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, price NUMERIC(4, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE membership');
        $this->addSql('DROP TABLE type_ab');
        $this->addSql('ALTER TABLE clients ADD client_name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE membership (id INT AUTO_INCREMENT NOT NULL, membership_type_id INT NOT NULL, client_name_id INT NOT NULL, price_id INT NOT NULL, begin DATE NOT NULL, end DATE NOT NULL, INDEX IDX_86FFD285D614C7E7 (price_id), INDEX IDX_86FFD2854CE11AC2 (membership_type_id), INDEX IDX_86FFD285232AD8AB (client_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE type_ab (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE membership ADD CONSTRAINT FK_86FFD285D614C7E7 FOREIGN KEY (price_id) REFERENCES type_ab (id)');
        $this->addSql('ALTER TABLE membership ADD CONSTRAINT FK_86FFD2854CE11AC2 FOREIGN KEY (membership_type_id) REFERENCES type_ab (id)');
        $this->addSql('ALTER TABLE membership ADD CONSTRAINT FK_86FFD285232AD8AB FOREIGN KEY (client_name_id) REFERENCES clients (id)');
        $this->addSql('DROP TABLE membership_type');
        $this->addSql('ALTER TABLE clients DROP client_name');
    }
}
