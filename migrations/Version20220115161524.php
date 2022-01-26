<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220115161524 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE shop (id INT AUTO_INCREMENT NOT NULL, nameshop VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, image_banner VARCHAR(255) DEFAULT NULL, image_profil VARCHAR(255) DEFAULT NULL, creat_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article CHANGE number_view number_view INT DEFAULT NULL, CHANGE number_like number_like INT DEFAULT NULL, CHANGE avis avis INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE shop');
        $this->addSql('ALTER TABLE article CHANGE number_view number_view INT NOT NULL, CHANGE number_like number_like INT NOT NULL, CHANGE avis avis INT NOT NULL');
    }
}
