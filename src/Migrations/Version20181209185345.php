<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181209185345 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bookings (id INT AUTO_INCREMENT NOT NULL, destination VARCHAR(255) NOT NULL, departure_date DATE NOT NULL, departure_time VARCHAR(6) NOT NULL, sharing VARCHAR(4) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE booking_date');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, lastname VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, departure_date VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, departure_hour VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, departure_minutes VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, destination VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, is_shared VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, sharing TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booking_date (id INT AUTO_INCREMENT NOT NULL, destination VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, departuredate DATE NOT NULL, departuretime VARCHAR(10) NOT NULL COLLATE utf8_unicode_ci, isShared VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, firstname VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, lastname VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, email VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE bookings');
    }
}
