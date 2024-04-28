<?php

namespace App\Models\DTO\User;

use App\Enums\EncryptionAlgorithm;

class UserGetDTO
{
    public function __construct(

        public string $email,
        public string $password,
    ) {}

    public static function fromLoginRequest(LoginRequestDTO $requestDTO): self
    {
        $password = hash(EncryptionAlgorithm::SHA256->value, $requestDTO->password);

        return (new self(
            $requestDTO->email,
            $password,
        ));
    }
}
