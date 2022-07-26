<?php

namespace App\Entity;

use App\Core\Orm\EntityInterface;
use App\Core\Validator\Constraint;
use App\Repository\UserRepository;
use DateTime;

class User implements EntityInterface
{
    private int $id;
    private string $username;
    private string $email;
    private string $password;
    private DateTime $createdAt;
    
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public static function getRepository(): string
    {
        return UserRepository::class;
    }

    public static function registerValidationRules(): array
    {
        return [
            'username' => [
                new Constraint\NotBlank("Vous devez saisir un nom d'utilisateur"),
                new Constraint\Length("Votre nom d'utilisateur doit contenir entre 5 et 25 caractères", 5, 25),
            ],
            'email' => [
                new Constraint\NotBlank("Vous devez saisir un e-mail"),
                new Constraint\Email(),
            ],
            'password' => [
                new Constraint\NotBlank("Vous devez saisir un mot de passe"),
                new Constraint\Length("Votre mot de passe doit contenir entre 8 et 30 caractères", 8, 30),
            ],
            'age' => [
                new Constraint\NotBlank("Vous devez être majeur pour créer un compte"),
            ],
            'cgu' => [
                new Constraint\NotBlank("Vous devez accepter les conditions du service"),
            ],
        ];
    }
}
