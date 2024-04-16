<?php

namespace App\Services;

use App\Models\Domain\SessionUser;
use App\Models\DTO\User\LoginRequestDTO;
use App\Models\DTO\User\RegisterRequestDTO;
use App\Models\DTO\User\UserGetDTO;
use App\Models\DTO\User\UserStoreDTO;
use App\Models\Errors\DatabaseException;
use App\Repositroies\UserRepository;

final readonly class UserService
{

    public function __construct(private UserRepository $userRepository)
    {}

    /**
     * @param RegisterRequestDTO $requestDTO
     * @return void
     * @throws DatabaseException
     */
    public function createUser(RegisterRequestDTO $requestDTO): void
    {
        $this->userRepository->create(UserStoreDTO::fromRegisterRequest($requestDTO));
    }

    /**
     * @param LoginRequestDTO $requestDTO
     * @return SessionUser
     * @throws DatabaseException
     */
    public function login(LoginRequestDTO $requestDTO): SessionUser
    {
        $loginDTO = UserGetDTO::fromLoginRequest($requestDTO);
        return $this->userRepository->getForLogin($loginDTO);
    }

}
