<?php

namespace App\Core\Orm;

use DI\Container;
use ReflectionMethod;

// Les repositories permettent d'interroger la base de données
// Un par table héritant du AbstractRepository
abstract class AbstractRepository
{
    public function __construct(protected DatabaseManager $database, private Container $container){}

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
        $query .= ' WHERE id = :id';
        $entries = $this->database->query($query, [
            'id' => $id,
        ]);

        if(count($entries) === 0){
            return null;
        }

        return $this->buildEntry(array_shift($entries));
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
            $setter = sprintf('set%s', $this->formatKey($key)); // setId, setName
            if(method_exists($entity, $setter)){

                $reflection = new ReflectionMethod($entity, $setter);
                $subEntityType = $reflection->getParameters()[0]->getType();
                if ($subEntityType->isBuiltin()) {
                    $entity->$setter($row);
                    continue;
                }

                // Permet de s'assurer que le type attendu par le setter implemente bien l'interface EntityInterface
                if (is_subclass_of($subEntityType->getName(), EntityInterface::class)) {
                    $subEntityName = $subEntityType->getName();
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
