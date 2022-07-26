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

    public function findByEmail(string $email): ?array
    {
        $query = 'SELECT * FROM ' . $this->getTable() . ' WHERE email = :email';

        $parameters = [
            'email' => $email,
        ];

        $results = $this->database->query($query, $parameters);
        return $results[0] ?? null;
    }

    public function toggleFavorite(int $userId, int $beerId): void
    {
        $query = 'INSERT INTO favorite (user_id, beer_id) VALUES (:userId, :beerId)';

        $parameters = [
            'userId' => $userId,
            'beerId' => $beerId,
        ];

        $this->database->query($query, $parameters);
    }
}
