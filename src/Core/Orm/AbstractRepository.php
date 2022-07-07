<?php

namespace App\Core\Orm;

use DI\Container;
use ReflectionMethod;

abstract class AbstractRepository
{
    public function __construct(private DatabaseManager $database, private Container $container){}

    public abstract function getTable(): string;
    public abstract function getEntity(): string;

    public function findAll(): array
    {
        $entries = $this->database->query('SELECT * FROM ' . $this->getTable());
        return $this->buildEntries($entries);
    }

    public function find(int $id)
    {
        $query = 'SELECT * FROM ' . $this->getTable();
        $query .= ' WHERE id = ' . $id; // TODO - Used prepared query
        $entry = $this->database->query($query)[0];
        return $this->buildEntry($entry);
    }

    private function buildEntries(array $entries): array
    {
        $entities = [];
        foreach ($entries as $entry) {
            $entities[] = $this->buildEntry($entry);
        }

        return $entities;
    }

    private function buildEntry(array $entry)
    {
        $entityType = $this->getEntity();
        $entity = new $entityType();

        foreach ($entry as $key => $row) {
            $setter = sprintf('set%s', $this->formatKey($key));
            if(method_exists($entity, $setter)){

                $reflection = new ReflectionMethod($entity, $setter);
                if ($reflection->getParameters()[0]->getType()->isBuiltin()) {
                    $entity->$setter($row);
                } else {
                    $subEntityName = $reflection->getParameters()[0]->getType()->getName();
                    $repository = $this->container->get($subEntityName::getRepository());
                    $subEntity = $repository->find($row);
                    $entity->$setter($subEntity);
                }

            }
        }

        return $entity;
    }

    private function formatKey(string $key): string
    {
        $key = str_replace('_id', '', $key);
        return ucfirst($key);
    }
}
