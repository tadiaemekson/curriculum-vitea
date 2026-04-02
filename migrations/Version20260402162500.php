<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260402162500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add GitHub links to seeded projects';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("UPDATE project SET github_url = 'https://github.com/tadiaemekson/first_project.git' WHERE title = 'Bootstrap Learning Project'");
        $this->addSql("UPDATE project SET github_url = 'https://github.com/tadiaemekson/B_TECH_PROJECT.git' WHERE title = 'B-Tech Management System'");
        $this->addSql("UPDATE project SET github_url = 'https://github.com/tadiaemekson/clinic_management_system.git' WHERE title = 'Clinic Management System'");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("UPDATE project SET github_url = NULL WHERE title IN ('Bootstrap Learning Project', 'B-Tech Management System', 'Clinic Management System')");
    }
}
