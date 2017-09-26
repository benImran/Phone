<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170926131406 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D971179CD6');
        $this->addSql('DROP INDEX IDX_D79572D971179CD6 ON model');
        $this->addSql('ALTER TABLE model ADD name VARCHAR(100) NOT NULL, DROP name_id');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE model ADD name_id INT DEFAULT NULL, DROP name');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D971179CD6 FOREIGN KEY (name_id) REFERENCES brand (id)');
        $this->addSql('CREATE INDEX IDX_D79572D971179CD6 ON model (name_id)');
    }
}
