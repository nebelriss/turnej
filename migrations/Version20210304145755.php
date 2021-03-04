<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210304145755 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE game_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE league_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE player_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE season_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE game (id INT NOT NULL, season_id INT NOT NULL, player_home_id INT DEFAULT NULL, player_away_id INT DEFAULT NULL, player_home_goals INT DEFAULT NULL, player_away_goals INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, round INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_232B318C4EC001D1 ON game (season_id)');
        $this->addSql('CREATE INDEX IDX_232B318C493937D9 ON game (player_home_id)');
        $this->addSql('CREATE INDEX IDX_232B318CEC1BF7DA ON game (player_away_id)');
        $this->addSql('CREATE TABLE league (id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE league_user (league_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(league_id, user_id))');
        $this->addSql('CREATE INDEX IDX_674C764858AFC4DE ON league_user (league_id)');
        $this->addSql('CREATE INDEX IDX_674C7648A76ED395 ON league_user (user_id)');
        $this->addSql('CREATE TABLE player (id INT NOT NULL, league_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_98197A6558AFC4DE ON player (league_id)');
        $this->addSql('CREATE TABLE season (id INT NOT NULL, league_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, event_date DATE NOT NULL, location VARCHAR(255) DEFAULT NULL, completed BOOLEAN NOT NULL, locked BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F0E45BA958AFC4DE ON season (league_id)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON "user" (username)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C4EC001D1 FOREIGN KEY (season_id) REFERENCES season (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C493937D9 FOREIGN KEY (player_home_id) REFERENCES player (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CEC1BF7DA FOREIGN KEY (player_away_id) REFERENCES player (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE league_user ADD CONSTRAINT FK_674C764858AFC4DE FOREIGN KEY (league_id) REFERENCES league (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE league_user ADD CONSTRAINT FK_674C7648A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A6558AFC4DE FOREIGN KEY (league_id) REFERENCES league (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT FK_F0E45BA958AFC4DE FOREIGN KEY (league_id) REFERENCES league (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE league_user DROP CONSTRAINT FK_674C764858AFC4DE');
        $this->addSql('ALTER TABLE player DROP CONSTRAINT FK_98197A6558AFC4DE');
        $this->addSql('ALTER TABLE season DROP CONSTRAINT FK_F0E45BA958AFC4DE');
        $this->addSql('ALTER TABLE game DROP CONSTRAINT FK_232B318C493937D9');
        $this->addSql('ALTER TABLE game DROP CONSTRAINT FK_232B318CEC1BF7DA');
        $this->addSql('ALTER TABLE game DROP CONSTRAINT FK_232B318C4EC001D1');
        $this->addSql('ALTER TABLE league_user DROP CONSTRAINT FK_674C7648A76ED395');
        $this->addSql('DROP SEQUENCE game_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE league_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE player_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE season_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE league');
        $this->addSql('DROP TABLE league_user');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE season');
        $this->addSql('DROP TABLE "user"');
    }
}
