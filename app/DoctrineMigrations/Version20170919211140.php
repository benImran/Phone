<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170919211140 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fos_user CHANGE nom nom VARCHAR(60) NOT NULL, CHANGE prenom prenom VARCHAR(60) NOT NULL, CHANGE confirmation_email confirmation_email VARCHAR(70) NOT NULL, CHANGE code_postale code_postale INT NOT NULL, CHANGE ville ville VARCHAR(100) NOT NULL, CHANGE pays pays VARCHAR(70) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fos_user CHANGE nom nom VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE confirmation_email confirmation_email VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE code_postale code_postale VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE ville ville VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE pays pays VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
    }
}
