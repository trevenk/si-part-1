<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190328163719 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE articulo ADD tipo_id INT NOT NULL');
        $this->addSql('ALTER TABLE articulo ADD CONSTRAINT FK_69E94E91A9276E6C FOREIGN KEY (tipo_id) REFERENCES tipo_articulo (id)');
        $this->addSql('CREATE INDEX IDX_69E94E91A9276E6C ON articulo (tipo_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE articulo DROP FOREIGN KEY FK_69E94E91A9276E6C');
        $this->addSql('DROP INDEX IDX_69E94E91A9276E6C ON articulo');
        $this->addSql('ALTER TABLE articulo DROP tipo_id');
    }
}
