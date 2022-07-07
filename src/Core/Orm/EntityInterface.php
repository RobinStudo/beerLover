<?php

namespace App\Core\Orm;

interface EntityInterface
{
    public static function getRepository(): string;
}
