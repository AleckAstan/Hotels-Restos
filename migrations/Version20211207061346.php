<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211207061346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tables (id INT AUTO_INCREMENT NOT NULL, restaurant_id INT NOT NULL, place_number SMALLINT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_84470221B1E7706E (restaurant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tables_types (tables_id INT NOT NULL, types_id INT NOT NULL, INDEX IDX_85C7338785405FD2 (tables_id), INDEX IDX_85C733878EB23357 (types_id), PRIMARY KEY(tables_id, types_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE types (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tables ADD CONSTRAINT FK_84470221B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurants (id)');
        $this->addSql('ALTER TABLE tables_types ADD CONSTRAINT FK_85C7338785405FD2 FOREIGN KEY (tables_id) REFERENCES tables (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tables_types ADD CONSTRAINT FK_85C733878EB23357 FOREIGN KEY (types_id) REFERENCES types (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tables_types DROP FOREIGN KEY FK_85C7338785405FD2');
        $this->addSql('ALTER TABLE tables_types DROP FOREIGN KEY FK_85C733878EB23357');
        $this->addSql('DROP TABLE tables');
        $this->addSql('DROP TABLE tables_types');
        $this->addSql('DROP TABLE types');
    }
}
