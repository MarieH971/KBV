<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250225155829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, etat VARCHAR(150) NOT NULL, quantite_disponible INT NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(150) NOT NULL, description LONGTEXT NOT NULL, quantite_disponible INT NOT NULL, image VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_equipment (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, equipment_id INT NOT NULL, date_reservation DATETIME NOT NULL, date_retour DATETIME NOT NULL, INDEX IDX_C97FB41CA76ED395 (user_id), INDEX IDX_C97FB41C517FE9FE (equipment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_training (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, type_entrainement_id INT NOT NULL, date_reservation DATETIME NOT NULL, INDEX IDX_48A7689BA76ED395 (user_id), INDEX IDX_48A7689BFD217C89 (type_entrainement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, heure_debut DATETIME NOT NULL, heure_fin DATETIME NOT NULL, type_entrainement VARCHAR(50) NOT NULL, first_namebre_places INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(50) NOT NULL, first_name VARCHAR(50) NOT NULL, photo VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(50) NOT NULL, user_role VARCHAR(255) NOT NULL, date_of_birth DATE NOT NULL, registration_date DATETIME NOT NULL, license_number VARCHAR(20) NOT NULL, license_expiration_date DATE NOT NULL, level VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation_equipment ADD CONSTRAINT FK_C97FB41CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation_equipment ADD CONSTRAINT FK_C97FB41C517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id)');
        $this->addSql('ALTER TABLE reservation_training ADD CONSTRAINT FK_48A7689BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation_training ADD CONSTRAINT FK_48A7689BFD217C89 FOREIGN KEY (type_entrainement_id) REFERENCES training (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_equipment DROP FOREIGN KEY FK_C97FB41CA76ED395');
        $this->addSql('ALTER TABLE reservation_equipment DROP FOREIGN KEY FK_C97FB41C517FE9FE');
        $this->addSql('ALTER TABLE reservation_training DROP FOREIGN KEY FK_48A7689BA76ED395');
        $this->addSql('ALTER TABLE reservation_training DROP FOREIGN KEY FK_48A7689BFD217C89');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE reservation_equipment');
        $this->addSql('DROP TABLE reservation_training');
        $this->addSql('DROP TABLE training');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
