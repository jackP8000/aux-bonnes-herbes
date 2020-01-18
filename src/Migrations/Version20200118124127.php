<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200118124127 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, room_id INT DEFAULT NULL, filename VARCHAR(255) NOT NULL, is_thumbnail TINYINT(1) NOT NULL, INDEX IDX_14B7841854177093 (room_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room_price (id INT AUTO_INCREMENT NOT NULL, room_id INT NOT NULL, weekend_nightly_rate DOUBLE PRECISION NOT NULL, week_nightly_rate DOUBLE PRECISION NOT NULL, low_season_weekly_rate DOUBLE PRECISION DEFAULT NULL, high_season_weekly_rate DOUBLE PRECISION DEFAULT NULL, additional_person_price_per_day DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX UNIQ_8074837254177093 (room_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo_category_photo (photo_category_id INT NOT NULL, photo_id INT NOT NULL, INDEX IDX_E4B7BD0C1CD1713E (photo_category_id), INDEX IDX_E4B7BD0C7E9E4C8C (photo_id), PRIMARY KEY(photo_category_id, photo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE addtional_service_price (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, daily_rate TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B7841854177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE room_price ADD CONSTRAINT FK_8074837254177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE photo_category_photo ADD CONSTRAINT FK_E4B7BD0C1CD1713E FOREIGN KEY (photo_category_id) REFERENCES photo_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE photo_category_photo ADD CONSTRAINT FK_E4B7BD0C7E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE photo_category_photo DROP FOREIGN KEY FK_E4B7BD0C7E9E4C8C');
        $this->addSql('ALTER TABLE photo_category_photo DROP FOREIGN KEY FK_E4B7BD0C1CD1713E');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B7841854177093');
        $this->addSql('ALTER TABLE room_price DROP FOREIGN KEY FK_8074837254177093');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE room_price');
        $this->addSql('DROP TABLE photo_category');
        $this->addSql('DROP TABLE photo_category_photo');
        $this->addSql('DROP TABLE addtional_service_price');
        $this->addSql('DROP TABLE room');
    }
}
