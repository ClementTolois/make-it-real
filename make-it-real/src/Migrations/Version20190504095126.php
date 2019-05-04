<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190504095126 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE accessorie (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, owner_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, INDEX IDX_B1B88561166D1F9C (project_id), INDEX IDX_B1B885617E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE budget (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, json LONGTEXT DEFAULT NULL, INDEX IDX_73F2F77B166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chat (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, sender_id INT DEFAULT NULL, message LONGTEXT NOT NULL, link LONGTEXT DEFAULT NULL, INDEX IDX_659DF2AA166D1F9C (project_id), INDEX IDX_659DF2AAF624B39D (sender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contributor (id INT AUTO_INCREMENT NOT NULL, project_id INT NOT NULL, user_id INT NOT NULL, role LONGTEXT NOT NULL, permission LONGTEXT NOT NULL, INDEX IDX_DA6F9793166D1F9C (project_id), INDEX IDX_DA6F9793A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, owner_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, INDEX IDX_D338D583166D1F9C (project_id), INDEX IDX_D338D5837E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, coords LONGTEXT DEFAULT NULL, INDEX IDX_741D53CD166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, json LONGTEXT DEFAULT NULL, INDEX IDX_D499BFF6166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_2FB3D0EE7E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE script (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, json LONGTEXT DEFAULT NULL, INDEX IDX_1C81873A166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technical_cut (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, json LONGTEXT DEFAULT NULL, INDEX IDX_6C205C43166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accessorie ADD CONSTRAINT FK_B1B88561166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE accessorie ADD CONSTRAINT FK_B1B885617E3C61F9 FOREIGN KEY (owner_id) REFERENCES contributor (id)');
        $this->addSql('ALTER TABLE budget ADD CONSTRAINT FK_73F2F77B166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE chat ADD CONSTRAINT FK_659DF2AA166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE chat ADD CONSTRAINT FK_659DF2AAF624B39D FOREIGN KEY (sender_id) REFERENCES contributor (id)');
        $this->addSql('ALTER TABLE contributor ADD CONSTRAINT FK_DA6F9793166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE contributor ADD CONSTRAINT FK_DA6F9793A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D5837E3C61F9 FOREIGN KEY (owner_id) REFERENCES contributor (id)');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CD166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF6166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE script ADD CONSTRAINT FK_1C81873A166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE technical_cut ADD CONSTRAINT FK_6C205C43166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE accessorie DROP FOREIGN KEY FK_B1B885617E3C61F9');
        $this->addSql('ALTER TABLE chat DROP FOREIGN KEY FK_659DF2AAF624B39D');
        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D5837E3C61F9');
        $this->addSql('ALTER TABLE accessorie DROP FOREIGN KEY FK_B1B88561166D1F9C');
        $this->addSql('ALTER TABLE budget DROP FOREIGN KEY FK_73F2F77B166D1F9C');
        $this->addSql('ALTER TABLE chat DROP FOREIGN KEY FK_659DF2AA166D1F9C');
        $this->addSql('ALTER TABLE contributor DROP FOREIGN KEY FK_DA6F9793166D1F9C');
        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D583166D1F9C');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CD166D1F9C');
        $this->addSql('ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF6166D1F9C');
        $this->addSql('ALTER TABLE script DROP FOREIGN KEY FK_1C81873A166D1F9C');
        $this->addSql('ALTER TABLE technical_cut DROP FOREIGN KEY FK_6C205C43166D1F9C');
        $this->addSql('DROP TABLE accessorie');
        $this->addSql('DROP TABLE budget');
        $this->addSql('DROP TABLE chat');
        $this->addSql('DROP TABLE contributor');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE planning');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE script');
        $this->addSql('DROP TABLE technical_cut');
    }
}
