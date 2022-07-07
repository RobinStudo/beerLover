<?php

namespace App\Core\Orm;

use PDO;

class DatabaseManager
{
    private PDO $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:dbname=beer_lover;host=localhost', 'root', null, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        ]);
    }

    public function query(string $query): array
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $entries = $stmt->fetchAll();

        return $entries;
    }
}
