<?php

namespace App\Repository;

use App\Core\Orm\AbstractRepository;
use App\Entity\Style;

class StyleRepository extends AbstractRepository
{
    public function getTable(): string
    {
        return 'style';
    }

    public function getEntity(): string
    {
        return Style::class;
    }
}
