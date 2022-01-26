<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220115183108 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_article (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_article_article (category_article_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_B7611683548AD6E2 (category_article_id), INDEX IDX_B76116837294869C (article_id), PRIMARY KEY(category_article_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, usename VARCHAR(255) NOT NULL, phone INT NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_article_article ADD CONSTRAINT FK_B7611683548AD6E2 FOREIGN KEY (category_article_id) REFERENCES category_article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_article_article ADD CONSTRAINT FK_B76116837294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_article_article DROP FOREIGN KEY FK_B7611683548AD6E2');
        $this->addSql('DROP TABLE category_article');
        $this->addSql('DROP TABLE category_article_article');
        $this->addSql('DROP TABLE user');
    }
}
