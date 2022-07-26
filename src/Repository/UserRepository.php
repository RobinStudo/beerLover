<?php

namespace App\Repository;

use App\Core\Orm\AbstractRepository;
use App\Entity\User;

class UserRepository extends AbstractRepository
{
    public function getTable(): string
    {
        return 'user';
    }

    public function getEntity(): string
    {
        return User::class;
    }

    public function insert(array $data): void
    {
        // Préparation de la requête avec des étiquettes à la place de valeurs
        $query = 'INSERT INTO ' . $this->getTable() . ' (username, email, password) VALUES (:username, :email, :password)';

        // Préparation des valeurs de remplacement des étiquettes
        $parameters = [
            'username' => htmlspecialchars($data['username']),
            'email' => htmlspecialchars($data['email']),
            'password' => $data['hashedPassword'],
        ];

        // Execution de la requête
        $this->database->query($query, $parameters);
    }
}
