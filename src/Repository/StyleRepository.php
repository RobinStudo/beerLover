<?php

namespace App\Repository;

use App\Entity\Style;
use PDO;

class StyleRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:dbname=beer_lover;host=localhost', 'root');
    }

    public function findAll(): array
    {
        $stmt = $this->db->prepare('SELECT * FROM style');
        $stmt->execute();
        $entries = $stmt->fetchAll();

        $styles = [];
        foreach ($entries as $entry) {
            $style = new Style();
            $style->setId($entry['id']);
            $style->setName($entry['name']);
            $style->setSlug($entry['slug']);
            $styles[] = $style;
        }

        return $styles;
    }
}
