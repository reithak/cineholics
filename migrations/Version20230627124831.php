<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230627124831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE seat (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', seat_number VARCHAR(255) NOT NULL, available TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seat_movie (seat_id INT NOT NULL, movie_id INT NOT NULL, INDEX IDX_CAC2794BC1DAFE35 (seat_id), INDEX IDX_CAC2794B8F93B6FC (movie_id), PRIMARY KEY(seat_id, movie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE seat_movie ADD CONSTRAINT FK_CAC2794BC1DAFE35 FOREIGN KEY (seat_id) REFERENCES seat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seat_movie ADD CONSTRAINT FK_CAC2794B8F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seat_movie DROP FOREIGN KEY FK_CAC2794BC1DAFE35');
        $this->addSql('ALTER TABLE seat_movie DROP FOREIGN KEY FK_CAC2794B8F93B6FC');
        $this->addSql('DROP TABLE seat');
        $this->addSql('DROP TABLE seat_movie');
    }
}
