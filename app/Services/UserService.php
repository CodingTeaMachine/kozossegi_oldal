<?php

namespace App\Services;

use App\Models\Admin\UserDropdownDTO;
use App\Models\Admin\UserEditDTO;
use App\Models\Admin\UserTableDTO;
use App\Models\Domain\SessionUser;
use App\Models\DTO\User\LoginRequestDTO;
use App\Models\DTO\User\RegisterRequestDTO;
use App\Models\DTO\User\UserGetDTO;
use App\Models\DTO\User\UserStoreDTO;
use App\Models\Errors\DatabaseException;
use App\Repositories\UserRepository;

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

    /**
     * @return array<UserTableDTO>
     */
    public function getForAdminTable(): array
    {
        return $this->userRepository->getForAdminTable();
    }

    public function deleteById(int $id): void
    {
        $this->userRepository->deleteById($id);
    }

    public function getForAdminEdit(int $id): UserEditDTO|null
    {
        return $this->userRepository->getForAdminEdit($id);
    }

    /**
     * @param UserEditDTO $userEditDTO
     * @return void
     * @throws DatabaseException
     */
    public function updateUser(UserEditDTO $userEditDTO): void
    {
        $this->userRepository->updateUser($userEditDTO);
    }

    /**
     * @return array<UserDropdownDTO>
     */
    public function getAllForDropdown(): array
    {
        return $this->userRepository->getAllForDropdown();
    }

}
