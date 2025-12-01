<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251119132840 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD compte_id INT NOT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455F2C56620 ON client (compte_id)');
        $this->addSql('ALTER TABLE compte ADD is_verified TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP is_verified');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455F2C56620');
        $this->addSql('DROP INDEX UNIQ_C7440455F2C56620 ON client');
        $this->addSql('ALTER TABLE client DROP compte_id');
    }
}
