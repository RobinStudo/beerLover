<?php

namespace App\Service;

use App\Repository\UserRepository;

class UserService
{
    const SESSION_KEY = 'authenticatedUser';

    public function __construct(private UserRepository $userRepository){}

    public function authenticate(array $credentials): bool
    {
        $user = $this->userRepository->findByEmail($credentials['email']);

        if($user === null){
            return false;
        }

        if(!password_verify($credentials['password'], $user['password'])){
            return false;
        }

        $_SESSION[self::SESSION_KEY] = $user['id'];
        return true;
    }

    public function isAuthenticated(): bool
    {
        return isset($_SESSION[self::SESSION_KEY]);
    }

    public function logout(): void
    {
        unset($_SESSION[self::SESSION_KEY]);
    }

    public function getAuthenticatedUserId(): int
    {
        return $_SESSION[self::SESSION_KEY];
    }
}
