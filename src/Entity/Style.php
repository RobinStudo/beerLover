<?php

namespace App\Entity;

use App\Core\Orm\EntityInterface;
use App\Repository\StyleRepository;

class Style implements EntityInterface
{
    private int $id;
    private string $name;
    private string $slug;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }
    
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    public static function getRepository(): string
    {
        return StyleRepository::class;
    }
}
