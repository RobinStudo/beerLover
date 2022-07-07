<?php

namespace App\Entity;

use App\Core\Orm\EntityInterface;
use App\Repository\BreweryRepository;

class Brewery implements EntityInterface
{
    private int $id;
    private string $name;
    private ?string $website;
    private string $country;

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

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): void
    {
        $this->website = $website;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public static function getRepository(): string
    {
        return BreweryRepository::class;
    }
}
