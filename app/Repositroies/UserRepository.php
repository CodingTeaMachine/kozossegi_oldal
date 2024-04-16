<?php

namespace App\Repositroies;

use App\Models\Domain\SessionUser;
use App\Models\DTO\User\UserGetDTO;
use App\Models\DTO\User\UserStoreDTO;
use App\Models\Errors\DatabaseException;
use Illuminate\Support\Facades\DB;

final class UserRepository
{

    /**
     * @param UserStoreDTO $userStoreDTO
     * @return void
     * @throws DatabaseException
     */
    public function create(UserStoreDTO $userStoreDTO): void
    {

        $rawRequest =
            /** @lang Oracle */ 'INSERT INTO
                FELHASZNALO(VEZETEKNEV,KERESZTNEV,EMAIL,JELSZO,SZEREP,SZULETESI_DATUM)
                VALUES (:firstname, :lastname, :email, :password, :role, :birthday)
            ';
        $isSuccessful = DB::insert($rawRequest, [
            'firstname' => $userStoreDTO->firstname,
            'lastname' => $userStoreDTO->lastname,
            'email' => $userStoreDTO->email,
            'password' => $userStoreDTO->password,
            'role' => $userStoreDTO->role,
            'birthday' => $userStoreDTO->birthday,
        ]);

        if(!$isSuccessful){
            throw new DatabaseException("Error creating the user");
        }
    }

    /**
     * @param UserGetDTO $userGetDTO
     * @return SessionUser
     * @throws DatabaseException
     */
    public function getForLogin(UserGetDTO $userGetDTO): SessionUser
    {
        $rawRequest =
            /** @lang Oracle */ '
                SELECT
                    AZONOSITO, VEZETEKNEV, KERESZTNEV, BECENEV, EMAIL, SZEREP
                FROM FELHASZNALO
                WHERE EMAIL = :email AND JELSZO = :password
            ';

        $result = DB::select($rawRequest, ['email' => $userGetDTO->email, 'password' => $userGetDTO->password]);

        if(empty($result)) {
            throw new DatabaseException("User doesn't exist");
        }

        return SessionUser::fromDBResult($result[0]);
    }

}
