<?php

namespace App\Repositroies;

use App\Models\Admin\UserEditDTO;
use App\Models\Admin\UserTableDTO;
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

    /**
     * @return array
     */
    public function getForAdminTable(): array
    {
        $rawRequest =
            /** @lang Oracle */ '
                SELECT
                    AZONOSITO, VEZETEKNEV, KERESZTNEV, BECENEV, EMAIL, SZEREP,
                    SZULETESI_DATUM, MUNKAHELY, ISKOLA, LAKHELY, TELEFONSZAM
                FROM FELHASZNALO
                ORDER BY AZONOSITO
            ';

        $results = DB::select($rawRequest);

        if(count($results) === 0) {
            return [];
        }

        return collect($results)
            ->map(fn($result) => UserTableDTO::getFromDBResult($result))
            ->all();
    }

    public function deleteById(int $id): void
    {
        $rawRequest =
            /** @lang Oracle */ '
               DELETE FELHASZNALO WHERE AZONOSITO = :id
            ';

        DB::delete($rawRequest, compact('id'));
    }

    public function getForAdminEdit(int $id): UserEditDTO|null
    {
        $rawRequest =
            /** @lang Oracle */ '
               SELECT
                    AZONOSITO, VEZETEKNEV, KERESZTNEV, BECENEV, EMAIL, SZEREP,
                    SZULETESI_DATUM, MUNKAHELY, ISKOLA, LAKHELY, SZULOVAROS, TELEFONSZAM
                FROM FELHASZNALO
                WHERE AZONOSITO = :id
            ';

        $result = DB::selectOne($rawRequest, compact('id'));

        if($result === null)
            return null;

        return  UserEditDTO::getFromDBResult($result);
    }

    public function userExists($id): bool
    {
        $rawRequest =
            /** @lang Oracle */ '
               SELECT COUNT(*) as count FROM FELHASZNALO WHERE AZONOSITO = :id
            ';

        $result = DB::selectOne($rawRequest, compact('id'));

        return $result->count !== 0;
    }

    /**
     * @param UserEditDTO $userEditDTO
     * @return void
     * @throws DatabaseException
     */
    public function updateUser(UserEditDTO $userEditDTO): void
    {
        if(!$this->userExists($userEditDTO->id)) {
            throw new DatabaseException("User doesn't exist");
        }

        $rawRequest =
            /** @lang Oracle */ '
                UPDATE FELHASZNALO
                SET
                    KERESZTNEV = :firstname,
                    VEZETEKNEV = :lastname,
                    BECENEV = :nickname,
                    EMAIL = :email,
                    SZEREP = :role,
                    SZULETESI_DATUM = :birthday,
                    MUNKAHELY = :workplace,
                    ISKOLA = :school,
                    LAKHELY = :placeOfLiving,
                    SZULOVAROS = :placeOfBirth,
                    TELEFONSZAM = :phone
                WHERE AZONOSITO = :id
            ';

        $updatedRows = DB::update($rawRequest, [
            'id' => $userEditDTO->id,
            'firstname' => $userEditDTO->firstname,
            'lastname' => $userEditDTO->lastname,
            'nickname' => $userEditDTO->nickname,
            'email' => $userEditDTO->email,
            'role' => $userEditDTO->role->value,
            'birthday' => $userEditDTO->birthday,
            'workplace' => $userEditDTO->workplace,
            'school' => $userEditDTO->school,
            'placeOfLiving' => $userEditDTO->placeOfLiving,
            'placeOfBirth' => $userEditDTO->placeOfBirth,
            'phone' => $userEditDTO->phone,
        ]);

        if($updatedRows === 0) {
            throw new DatabaseException("Error updating the user");
        }
    }

}
