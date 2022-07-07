<?php

namespace App\Core\Orm;

use App\Entity\Brewery;

abstract class AbstractRepository
{
    public function __construct(private DatabaseManager $database){}

    public abstract function getTable(): string;
    public abstract function getEntity(): string;

    public function findAll(): array
    {
        $entries = $this->database->query('SELECT * FROM ' . $this->getTable());
        $entityType = $this->getEntity();

        $entities = [];
        foreach ($entries as $entry) {
            $entity = new $entityType();

            foreach ($entry as $key => $row) {
                $setter = sprintf('set%s', ucfirst($key));
                if(method_exists($entity, $setter)){
                    $entity->$setter($row);
                }
            }

            $entities[] = $entity;
        }

        return $entities;
    }
}
