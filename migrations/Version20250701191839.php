<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250701191839 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE capsula (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, criado_em DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', titulo VARCHAR(255) NOT NULL, descricao VARCHAR(255) NOT NULL, open_data DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', senha VARCHAR(255) NOT NULL, INDEX IDX_C505659ADB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conteudo (id INT AUTO_INCREMENT NOT NULL, capsula_id INT NOT NULL, criado_em DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', conteudo_type VARCHAR(255) NOT NULL, INDEX IDX_FA4A13F8FE2593BE (capsula_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE capsula ADD CONSTRAINT FK_C505659ADB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE conteudo ADD CONSTRAINT FK_FA4A13F8FE2593BE FOREIGN KEY (capsula_id) REFERENCES capsula (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE capsula DROP FOREIGN KEY FK_C505659ADB38439E');
        $this->addSql('ALTER TABLE conteudo DROP FOREIGN KEY FK_FA4A13F8FE2593BE');
        $this->addSql('DROP TABLE capsula');
        $this->addSql('DROP TABLE conteudo');
        $this->addSql('DROP TABLE usuario');
    }
}
