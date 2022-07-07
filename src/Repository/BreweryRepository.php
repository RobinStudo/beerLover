<?php

namespace App\Repository;

use App\Core\Orm\AbstractRepository;
use App\Entity\Brewery;

class BreweryRepository extends AbstractRepository
{
    public function getTable(): string
    {
        return 'brewery';
    }

    public function getEntity(): string
    {
        return Brewery::class;
    }
}
