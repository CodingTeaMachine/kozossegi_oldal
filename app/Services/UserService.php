<?php

namespace App\Services;

use App\Repositroies\UserRepository;

readonly final class UserService
{

    public function __construct(private readonly UserRepository $userRepository)
    {}

    public function getUsers(): array
    {
        return $this->userRepository->getUsers();
    }
}
