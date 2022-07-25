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
        $query = 'INSERT INTO ' . $this->getTable() . ' (username, email, password) VALUES (:username, :email, :password)';
        $this->database->query($query, [
            'username' => htmlspecialchars($data['username']),
            'email' => htmlspecialchars($data['email']),
            'password' => $data['hashedPassword'],
        ]);
    }
}
