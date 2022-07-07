<?php

namespace App\Entity;

use App\Core\Orm\EntityInterface;
use App\Repository\BeerRepository;

class Beer implements EntityInterface
{
    private int $id;
    private string $name;
    private string $slug;
    private string $picture;
    private Style $style;

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

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): void
    {
        $this->picture = $picture;
    }

    public function getStyle(): Style
    {
        return $this->style;
    }

    public function setStyle(Style $style): void
    {
        $this->style = $style;
    }

    public static function getRepository(): string
    {
        return BeerRepository::class;
    }
}
