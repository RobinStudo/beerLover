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
}
