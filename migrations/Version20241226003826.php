<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241226003826 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adherents (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, adresse VARCHAR(255) NOT NULL, telephone VARCHAR(15) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, email VARCHAR(50) NOT NULL, mot_de_passe VARCHAR(50) NOT NULL, date_de_naissance DATE NOT NULL, date_inscription DATETIME NOT NULL, numero_licence VARCHAR(20) NOT NULL, date_expiration_licence DATE NOT NULL, niveau VARCHAR(30) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT DEFAULT NULL, etat VARCHAR(150) NOT NULL, quantite_disponible INT NOT NULL, stock INT NOT NULL, photo VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pratique (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, session VARCHAR(255) NOT NULL, capacite_max INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(150) NOT NULL, description LONGTEXT NOT NULL, stock INT NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_equipement (id INT AUTO_INCREMENT NOT NULL, adherents_id INT NOT NULL, equipement_id INT NOT NULL, date DATE NOT NULL, date_debut DATETIME NOT NULL, date_retour DATETIME NOT NULL, INDEX IDX_D81E0F4715364D07 (adherents_id), INDEX IDX_D81E0F47806F0F5C (equipement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_pratique (id INT AUTO_INCREMENT NOT NULL, adherents_id INT NOT NULL, session_id INT NOT NULL, date_reservation DATETIME NOT NULL, INDEX IDX_9C47559515364D07 (adherents_id), INDEX IDX_9C475595613FECDF (session_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation_equipement ADD CONSTRAINT FK_D81E0F4715364D07 FOREIGN KEY (adherents_id) REFERENCES adherents (id)');
        $this->addSql('ALTER TABLE reservation_equipement ADD CONSTRAINT FK_D81E0F47806F0F5C FOREIGN KEY (equipement_id) REFERENCES equipement (id)');
        $this->addSql('ALTER TABLE reservation_pratique ADD CONSTRAINT FK_9C47559515364D07 FOREIGN KEY (adherents_id) REFERENCES adherents (id)');
        $this->addSql('ALTER TABLE reservation_pratique ADD CONSTRAINT FK_9C475595613FECDF FOREIGN KEY (session_id) REFERENCES pratique (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_equipement DROP FOREIGN KEY FK_D81E0F4715364D07');
        $this->addSql('ALTER TABLE reservation_equipement DROP FOREIGN KEY FK_D81E0F47806F0F5C');
        $this->addSql('ALTER TABLE reservation_pratique DROP FOREIGN KEY FK_9C47559515364D07');
        $this->addSql('ALTER TABLE reservation_pratique DROP FOREIGN KEY FK_9C475595613FECDF');
        $this->addSql('DROP TABLE adherents');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE pratique');
        $this->addSql('DROP TABLE produits');
        $this->addSql('DROP TABLE reservation_equipement');
        $this->addSql('DROP TABLE reservation_pratique');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
