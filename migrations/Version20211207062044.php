<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211207062044 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chambres (id INT AUTO_INCREMENT NOT NULL, hotel_id INT NOT NULL, person_number SMALLINT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_36C929623243BB18 (hotel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chambres_types (chambres_id INT NOT NULL, types_id INT NOT NULL, INDEX IDX_7146BE268BEC3FB7 (chambres_id), INDEX IDX_7146BE268EB23357 (types_id), PRIMARY KEY(chambres_id, types_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pictures (id INT AUTO_INCREMENT NOT NULL, hotel_id INT DEFAULT NULL, restaurant_id INT DEFAULT NULL, link VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_8F7C2FC03243BB18 (hotel_id), INDEX IDX_8F7C2FC0B1E7706E (restaurant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservations (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, hotel_id INT DEFAULT NULL, restaurant_id INT DEFAULT NULL, date DATETIME NOT NULL, room_num SMALLINT NOT NULL, person_number SMALLINT NOT NULL, payment_ref VARCHAR(255) NOT NULL, INDEX IDX_4DA239A76ED395 (user_id), INDEX IDX_4DA2393243BB18 (hotel_id), INDEX IDX_4DA239B1E7706E (restaurant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chambres ADD CONSTRAINT FK_36C929623243BB18 FOREIGN KEY (hotel_id) REFERENCES hotels (id)');
        $this->addSql('ALTER TABLE chambres_types ADD CONSTRAINT FK_7146BE268BEC3FB7 FOREIGN KEY (chambres_id) REFERENCES chambres (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chambres_types ADD CONSTRAINT FK_7146BE268EB23357 FOREIGN KEY (types_id) REFERENCES types (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pictures ADD CONSTRAINT FK_8F7C2FC03243BB18 FOREIGN KEY (hotel_id) REFERENCES hotels (id)');
        $this->addSql('ALTER TABLE pictures ADD CONSTRAINT FK_8F7C2FC0B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurants (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA2393243BB18 FOREIGN KEY (hotel_id) REFERENCES hotels (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurants (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambres_types DROP FOREIGN KEY FK_7146BE268BEC3FB7');
        $this->addSql('DROP TABLE chambres');
        $this->addSql('DROP TABLE chambres_types');
        $this->addSql('DROP TABLE pictures');
        $this->addSql('DROP TABLE reservations');
    }
}
