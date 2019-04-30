<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190430211056 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE contact_request (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, store_id INTEGER DEFAULT NULL, email VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, content CLOB NOT NULL, date DATETIME NOT NULL, type VARCHAR(255) NOT NULL, refkey VARCHAR(32) NOT NULL, comment CLOB NOT NULL)');
        $this->addSql('CREATE INDEX IDX_A1B8AE1EB092A811 ON contact_request (store_id)');
        $this->addSql('DROP INDEX IDX_9474526C63379586');
        $this->addSql('CREATE TEMPORARY TABLE __temp__comment AS SELECT id, comments_id, name, email, text, date, reviewed FROM comment');
        $this->addSql('DROP TABLE comment');
        $this->addSql('CREATE TABLE comment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, comments_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, email VARCHAR(255) NOT NULL COLLATE BINARY, text VARCHAR(255) NOT NULL COLLATE BINARY, date DATETIME NOT NULL, reviewed BOOLEAN NOT NULL, CONSTRAINT FK_9474526C63379586 FOREIGN KEY (comments_id) REFERENCES stores (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO comment (id, comments_id, name, email, text, date, reviewed) SELECT id, comments_id, name, email, text, date, reviewed FROM __temp__comment');
        $this->addSql('DROP TABLE __temp__comment');
        $this->addSql('CREATE INDEX IDX_9474526C63379586 ON comment (comments_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE contact_request');
        $this->addSql('DROP INDEX IDX_9474526C63379586');
        $this->addSql('CREATE TEMPORARY TABLE __temp__comment AS SELECT id, comments_id, name, email, text, date, reviewed FROM comment');
        $this->addSql('DROP TABLE comment');
        $this->addSql('CREATE TABLE comment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, comments_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, text VARCHAR(255) NOT NULL, date DATETIME NOT NULL, reviewed BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO comment (id, comments_id, name, email, text, date, reviewed) SELECT id, comments_id, name, email, text, date, reviewed FROM __temp__comment');
        $this->addSql('DROP TABLE __temp__comment');
        $this->addSql('CREATE INDEX IDX_9474526C63379586 ON comment (comments_id)');
    }
}
