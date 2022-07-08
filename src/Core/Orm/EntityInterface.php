<?php

namespace App\Core\Orm;

// Les entités représentent les tables
// Cette interface permet de les standardiser
interface EntityInterface
{
    public static function getRepository(): string;
}
