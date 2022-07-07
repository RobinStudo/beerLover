<?php

namespace App\Repository;

use App\Core\Orm\AbstractRepository;
use App\Entity\Beer;

class BeerRepository extends AbstractRepository
{
    public function getTable(): string
    {
        return 'beer';
    }

    public function getEntity(): string
    {
        return Beer::class;
    }
}
