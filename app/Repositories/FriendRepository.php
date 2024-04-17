<?php

namespace App\Repositories;

use App\Models\Admin\FriendCreateDTO;
use App\Models\Admin\FriendEditDTO;
use App\Models\Admin\FriendTableDTO;
use App\Models\Errors\DatabaseException;
use Illuminate\Support\Facades\DB;

final class FriendRepository
{

    /**
     * @param FriendCreateDTO $friendCreateDTO
     * @return void
     * @throws DatabaseException
     */
    public function create(FriendCreateDTO $friendCreateDTO): void
    {

        if($this->friendExists($friendCreateDTO->senderId, $friendCreateDTO->receiverId)) {
            throw new DatabaseException("Friend already exists");
        }

        $rawRequest =
            /** @lang Oracle */ 'INSERT INTO
                ISMEROS(KERELMEZO_AZONOSITO, FOGADO_AZONOSITO)
                VALUES (:senderId, :receiverId)
            ';
        $isSuccessful = DB::insert($rawRequest, [
            'senderId' => $friendCreateDTO->senderId,
            'receiverId' => $friendCreateDTO->receiverId,
        ]);

        if(!$isSuccessful){
            throw new DatabaseException("Error creating the friend");
        }
    }

    /**
     * @return array<FriendTableDTO>
     */
    public function getForAdminTable(): array
    {
        $rawRequest =
            /** @lang Oracle */ '
                SELECT
                    FOGADO_AZONOSITO,
                    KERELMEZO_AZONOSITO,
                    sender.KERESZTNEV as sender_firstname,
                    sender.VEZETEKNEV as sender_lastname,
                    reciever.KERESZTNEV as receiver_firstname,
                    reciever.VEZETEKNEV as receiver_lastname
                FROM ISMEROS
                JOIN
                    FELHASZNALO reciever ON FOGADO_AZONOSITO = reciever.AZONOSITO
                JOIN
                    FELHASZNALO sender ON KERELMEZO_AZONOSITO = sender.AZONOSITO
            ';

        $results = DB::select($rawRequest);

        if(count($results) === 0) {
            return [];
        }

        return collect($results)
            ->map(fn($result) => FriendTableDTO::getFromDBResult($result))
            ->all();
    }

    public function deleteById(int $senderId, int $receiverId): void
    {
        $rawRequest =
            /** @lang Oracle */ '
               DELETE ISMEROS WHERE KERELMEZO_AZONOSITO = :senderId AND FOGADO_AZONOSITO = :receiverId
            ';

        DB::delete($rawRequest, compact('senderId', 'receiverId'));
    }

    public function friendExists(int $senderId, int $receiverId): bool
    {
        $rawRequest =
            /** @lang Oracle */ '
               SELECT COUNT(*) as count FROM ISMEROS
               WHERE
                   (KERELMEZO_AZONOSITO = :senderId AND FOGADO_AZONOSITO = :receiverId) OR
                   (FOGADO_AZONOSITO = :senderId AND KERELMEZO_AZONOSITO = :receiverId)
            ';

        $result = DB::selectOne($rawRequest, compact('senderId', 'receiverId'));

        return intval($result->count) !== 0;
    }

    /**
     * @param FriendEditDTO $friendEditDTO
     * @return void
     * @throws DatabaseException
     */
    public function updateFriend(FriendEditDTO $friendEditDTO): void
    {
        if(!$this->friendExists($friendEditDTO->initialSenderId, $friendEditDTO->initialReceiverId)) {
            throw new DatabaseException("Friend doesn't exist");
        }

        if($this->friendExists($friendEditDTO->senderId, $friendEditDTO->receiverId)) {
            throw new DatabaseException("Friend already exists");
        }

        $rawRequest =
            /** @lang Oracle */ '
                UPDATE ISMEROS
                SET
                    KERELMEZO_AZONOSITO = :senderId,
                    FOGADO_AZONOSITO = :receiverId
                WHERE
                    KERELMEZO_AZONOSITO = :initialSenderId AND
                    FOGADO_AZONOSITO = :initialReceiverId
            ';

        $updatedRows = DB::update($rawRequest, [
            'senderId' => $friendEditDTO->senderId,
            'receiverId' => $friendEditDTO->receiverId,
            'initialSenderId' => $friendEditDTO->initialSenderId,
            'initialReceiverId' => $friendEditDTO->initialReceiverId,
        ]);

        if($updatedRows === 0) {
            throw new DatabaseException("Error updating the friend");
        }
    }

}
