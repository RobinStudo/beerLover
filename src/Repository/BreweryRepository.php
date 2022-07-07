<?php

namespace App\Repository;

use App\Entity\Brewery;
use PDO;

class BreweryRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:dbname=beer_lover;host=localhost', 'root', null, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        ]);
    }

    public function findAll(): array
    {
        $stmt = $this->db->prepare('SELECT * FROM brewery');
        $stmt->execute();
        $entries = $stmt->fetchAll();

        $breweries = [];
        foreach ($entries as $entry) {
            $brewery = new Brewery();
            $brewery->setId($entry['id']);
            $brewery->setName($entry['name']);
            $brewery->setWebsite($entry['website']);
            $brewery->setCountry($entry['country']);
            $breweries[] = $brewery;
        }

        return $breweries;
    }
}
