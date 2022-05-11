<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220507175014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clients DROP client_name');
        $this->addSql('ALTER TABLE membership ADD client_name_id INT NOT NULL');
        $this->addSql('ALTER TABLE membership ADD CONSTRAINT FK_86FFD285232AD8AB FOREIGN KEY (client_name_id) REFERENCES clients (id)');
        $this->addSql('CREATE INDEX IDX_86FFD285232AD8AB ON membership (client_name_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clients ADD client_name VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE membership DROP FOREIGN KEY FK_86FFD285232AD8AB');
        $this->addSql('DROP INDEX IDX_86FFD285232AD8AB ON membership');
        $this->addSql('ALTER TABLE membership DROP client_name_id');
    }
}
