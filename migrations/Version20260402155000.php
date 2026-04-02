<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260402155000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Seed portfolio skills with practical full-stack entries';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("INSERT INTO skill (name, level, category) VALUES ('PHP', 'Expert', 'Backend')");
        $this->addSql("INSERT INTO skill (name, level, category) VALUES ('Symfony', 'Expert', 'Backend')");
        $this->addSql("INSERT INTO skill (name, level, category) VALUES ('MySQL', 'Expert', 'Database')");
        $this->addSql("INSERT INTO skill (name, level, category) VALUES ('Doctrine ORM', 'Intermediate', 'Backend')");
        $this->addSql("INSERT INTO skill (name, level, category) VALUES ('REST API Design', 'Intermediate', 'Backend')");
        $this->addSql("INSERT INTO skill (name, level, category) VALUES ('JavaScript', 'Intermediate', 'Frontend')");
        $this->addSql("INSERT INTO skill (name, level, category) VALUES ('HTML5', 'Expert', 'Frontend')");
        $this->addSql("INSERT INTO skill (name, level, category) VALUES ('CSS3', 'Intermediate', 'Frontend')");
        $this->addSql("INSERT INTO skill (name, level, category) VALUES ('Git', 'Intermediate', 'Tools')");
        $this->addSql("INSERT INTO skill (name, level, category) VALUES ('Docker', 'Beginner', 'DevOps')");
        $this->addSql("INSERT INTO skill (name, level, category) VALUES ('Linux CLI', 'Intermediate', 'Tools')");
        $this->addSql("INSERT INTO skill (name, level, category) VALUES ('Testing (PHPUnit)', 'Beginner', 'Quality')");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DELETE FROM skill WHERE name IN ('PHP', 'Symfony', 'MySQL', 'Doctrine ORM', 'REST API Design', 'JavaScript', 'HTML5', 'CSS3', 'Git', 'Docker', 'Linux CLI', 'Testing (PHPUnit)')");
    }
}
