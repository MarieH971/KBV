<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250103151338 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_equipement DROP FOREIGN KEY FK_D81E0F4715364D07');
        $this->addSql('CREATE TABLE adherent (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, adresse VARCHAR(255) NOT NULL, telephone VARCHAR(15) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, email VARCHAR(50) NOT NULL, mot_de_passe VARCHAR(50) NOT NULL, date_de_naissance DATE NOT NULL, date_inscription DATETIME NOT NULL, numero_licence VARCHAR(20) NOT NULL, date_expiration_licence DATETIME NOT NULL, role_adherent VARCHAR(255) NOT NULL, niveau VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, stock INT NOT NULL, photo VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE adherents');
        $this->addSql('DROP TABLE produits');
        $this->addSql('DROP INDEX IDX_D81E0F4715364D07 ON reservation_equipement');
        $this->addSql('ALTER TABLE reservation_equipement CHANGE adherents_id adherent_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation_equipement ADD CONSTRAINT FK_D81E0F4725F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id)');
        $this->addSql('CREATE INDEX IDX_D81E0F4725F06C53 ON reservation_equipement (adherent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_equipement DROP FOREIGN KEY FK_D81E0F4725F06C53');
        $this->addSql('CREATE TABLE adherents (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, adresse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, telephone VARCHAR(15) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, photo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, mot_de_passe VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_de_naissance DATE NOT NULL, date_inscription DATETIME NOT NULL, numero_licence VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_expiration_licence DATETIME NOT NULL, niveau VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, stock INT NOT NULL, photo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, categorie VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE adherent');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP INDEX IDX_D81E0F4725F06C53 ON reservation_equipement');
        $this->addSql('ALTER TABLE reservation_equipement CHANGE adherent_id adherents_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation_equipement ADD CONSTRAINT FK_D81E0F4715364D07 FOREIGN KEY (adherents_id) REFERENCES adherents (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D81E0F4715364D07 ON reservation_equipement (adherents_id)');
    }
}
