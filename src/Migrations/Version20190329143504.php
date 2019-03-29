<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190329143504 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ingrediente ADD alergeno_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ingrediente ADD CONSTRAINT FK_BFB4A41E3E89035 FOREIGN KEY (alergeno_id) REFERENCES alergenos (id)');
        $this->addSql('CREATE INDEX IDX_BFB4A41E3E89035 ON ingrediente (alergeno_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ingrediente DROP FOREIGN KEY FK_BFB4A41E3E89035');
        $this->addSql('DROP INDEX IDX_BFB4A41E3E89035 ON ingrediente');
        $this->addSql('ALTER TABLE ingrediente DROP alergeno_id');
    }
}
