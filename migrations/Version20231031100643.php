<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231031100643 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comment_user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, datetime_created DATETIME NOT NULL, content LONGTEXT NOT NULL, id_author_id INT NOT NULL, INDEX IDX_5A8A6C8D76404F3C (id_author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_author (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_comment (id INT AUTO_INCREMENT NOT NULL, id_article_id INT NOT NULL, id_user_id INT NOT NULL, message LONGTEXT NOT NULL, datetime_created DATETIME NOT NULL, INDEX IDX_A99CE55F9514AA5C (id_article_id), INDEX IDX_A99CE55F79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_comment ADD CONSTRAINT FK_A99CE55F9514AA5C FOREIGN KEY (id_article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE article_comment ADD CONSTRAINT FK_A99CE55F79F37AE5 FOREIGN KEY (id_user_id) REFERENCES comment_user (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_5A8A6C8D76404F3C FOREIGN KEY (id_author_id) REFERENCES article_author (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_comment DROP FOREIGN KEY FK_A99CE55F9514AA5C');
        $this->addSql('ALTER TABLE article_comment DROP FOREIGN KEY FK_A99CE55F79F37AE5');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_5A8A6C8D76404F3C');
        $this->addSql('DROP TABLE comment_user');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_author');
        $this->addSql('DROP TABLE article_comment');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
