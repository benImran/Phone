<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170829154357 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE brand DROP number');
        $this->addSql('ALTER TABLE fos_user ADD Genre VARCHAR(255) NOT NULL, ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD date_naissance VARCHAR(255) NOT NULL, ADD adresse VARCHAR(255) NOT NULL, ADD complément_adresse VARCHAR(255) NOT NULL, ADD confirmation_email VARCHAR(255) NOT NULL, ADD code_postale VARCHAR(255) NOT NULL, ADD ville VARCHAR(255) NOT NULL, ADD pays VARCHAR(255) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE brand ADD number INT NOT NULL');
        $this->addSql('ALTER TABLE fos_user DROP Genre, DROP nom, DROP prenom, DROP date_naissance, DROP adresse, DROP complément_adresse, DROP confirmation_email, DROP code_postale, DROP ville, DROP pays');
    }
}
