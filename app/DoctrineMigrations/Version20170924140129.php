<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170924140129 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE orders ADD payment_instruction_id INT DEFAULT NULL, DROP paymentInstruction');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE8789B572 FOREIGN KEY (payment_instruction_id) REFERENCES payment_instructions (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E52FFDEE8789B572 ON orders (payment_instruction_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE8789B572');
        $this->addSql('DROP INDEX UNIQ_E52FFDEE8789B572 ON orders');
        $this->addSql('ALTER TABLE orders ADD paymentInstruction VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, DROP payment_instruction_id');
    }
}
