<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260402161000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Seed portfolio projects with three main entries';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            "INSERT INTO project (title, description, tech_stack, github_url, live_url, image_filename) VALUES " .
            "('Bootstrap Learning Project', 'A learning project where I focused on building responsive layouts and components using Bootstrap. I practiced grids, utilities, navigation, forms, and clean UI structure.', 'HTML, CSS, Bootstrap', NULL, NULL, NULL)"
        );

        $this->addSql(
            "INSERT INTO project (title, description, tech_stack, github_url, live_url, image_filename) VALUES " .
            "('B-Tech Management System', 'A B-Tech project built in PHP using Grocery CRUD. It supports managing records efficiently with a clean admin interface and CRUD operations.', 'PHP, MySQL, Grocery CRUD', NULL, NULL, NULL)"
        );

        $this->addSql(
            "INSERT INTO project (title, description, tech_stack, github_url, live_url, image_filename) VALUES " .
            "('Clinic Management System', 'A clinic management system built with PHP to manage patients, appointments, and basic clinic operations. Designed to be simple, fast, and practical for daily use.', 'PHP, MySQL', NULL, NULL, NULL)"
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql(
            "DELETE FROM project WHERE title IN (" .
            "'Bootstrap Learning Project'," .
            "'B-Tech Management System'," .
            "'Clinic Management System'" .
            ")"
        );
    }
}
