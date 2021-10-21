<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211019180621 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, collect_at DATETIME DEFAULT NULL, booking_date DATETIME DEFAULT NULL, return_date DATETIME DEFAULT NULL, is_validate TINYINT(1) NOT NULL, is_return TINYINT(1) NOT NULL, INDEX IDX_E00CEDDE9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE books (id INT AUTO_INCREMENT NOT NULL, booking_id_id INT DEFAULT NULL, title VARCHAR(500) NOT NULL, author VARCHAR(255) NOT NULL, summary LONGTEXT NOT NULL, parution_date DATETIME DEFAULT NULL, kind VARCHAR(255) NOT NULL, is_booked TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_4A1B2A92EE3863E2 (booking_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, passeword VARCHAR(255) NOT NULL, birth_date DATETIME NOT NULL, role VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, postal_code VARCHAR(10) NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE9D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A92EE3863E2 FOREIGN KEY (booking_id_id) REFERENCES booking (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE books DROP FOREIGN KEY FK_4A1B2A92EE3863E2');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE9D86650F');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE books');
        $this->addSql('DROP TABLE users');
    }
}
