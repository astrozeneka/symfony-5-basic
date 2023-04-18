<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230418100922 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__specimen AS SELECT id, location, temperature, collectorName, image, sampleId FROM specimen');
        $this->addSql('DROP TABLE specimen');
        $this->addSql('CREATE TABLE specimen (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, location VARCHAR(255) NOT NULL, temperature DOUBLE PRECISION NOT NULL, collectorName VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, sampleId VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO specimen (id, location, temperature, collectorName, image, sampleId) SELECT id, location, temperature, collectorName, image, sampleId FROM __temp__specimen');
        $this->addSql('DROP TABLE __temp__specimen');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__specimen AS SELECT id, location, temperature, collectorName, image, sampleId FROM specimen');
        $this->addSql('DROP TABLE specimen');
        $this->addSql('CREATE TABLE specimen (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, location INTEGER NOT NULL, temperature DOUBLE PRECISION NOT NULL, collectorName VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, sampleId VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO specimen (id, location, temperature, collectorName, image, sampleId) SELECT id, location, temperature, collectorName, image, sampleId FROM __temp__specimen');
        $this->addSql('DROP TABLE __temp__specimen');
    }
}
