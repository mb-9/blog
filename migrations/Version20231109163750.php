<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231109163750 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_comment DROP FOREIGN KEY FK_A99CE55F79F37AE5');
        $this->addSql('ALTER TABLE article_comment DROP id_user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_comment ADD id_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE article_comment ADD CONSTRAINT FK_A99CE55F79F37AE5 FOREIGN KEY (id_user_id) REFERENCES comment_user (id)');
    }
}
