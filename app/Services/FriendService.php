<?php

namespace App\Services;

use App\Models\Admin\FriendCreateDTO;
use App\Models\Admin\FriendEditDTO;
use App\Models\Admin\FriendTableDTO;
use App\Models\Admin\UserEditDTO;
use App\Models\Admin\UserTableDTO;
use App\Models\Domain\SessionUser;
use App\Models\DTO\User\LoginRequestDTO;
use App\Models\DTO\User\RegisterRequestDTO;
use App\Models\DTO\User\UserGetDTO;
use App\Models\DTO\User\UserStoreDTO;
use App\Models\Errors\DatabaseException;
use App\Repositories\FriendRepository;
use App\Repositories\UserRepository;

final readonly class FriendService
{

    public function __construct(private FriendRepository $friendRepository)
    {}

    /**
     * @param FriendCreateDTO $requestDTO
     * @return void
     * @throws DatabaseException
     */
    public function create(FriendCreateDTO $requestDTO): void
    {
        $this->friendRepository->create($requestDTO);
    }


    /**
     * @return array<FriendTableDTO>
     */
    public function getForAdminTable(): array
    {
        return $this->friendRepository->getForAdminTable();
    }

    public function deleteById(int $senderId, int $receiverId): void
    {
        $this->friendRepository->deleteById($senderId, $receiverId);
    }


    /**
     * @param FriendEditDTO $friendEditDTO
     * @return void
     * @throws DatabaseException
     */
    public function updateFriend(FriendEditDTO $friendEditDTO): void
    {
        $this->friendRepository->updateFriend($friendEditDTO);
    }



}
