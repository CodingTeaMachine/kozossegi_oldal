<?php

namespace App\Models\DTO\User;
use App\Enums\EncryptionAlgorithm;
use App\Enums\UserRole;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class UserStoreDTO
{
    public function __construct(
        public string $lastname,
        public string $firstname,
        public string $email,
        public string $password,
        public string $birthday,
        public int $role,
    ) {}

    public static function fromRegisterRequest(RegisterRequestDTO $requestDTO): self
    {
        $password = hash(EncryptionAlgorithm::SHA256->value, $requestDTO->password);

        return (new self(
            $requestDTO->lastname,
            $requestDTO->firstname,
            $requestDTO->email,
            $password,
            $requestDTO->birthday->format('Y/m/d'),
            UserRole::USER->value
        ));
    }
}
