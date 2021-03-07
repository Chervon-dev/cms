<?php

namespace App\Service;

use App\Model\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Сервис для работы с моделью (User)
 * Class UserService
 * @package App\Service
 */
class UserService
{
    /**
     * Если есть пользователь (по Email)
     * @param string $email
     * @return Model|Builder|null
     */
    public function getDataByEmail(string $email): Model|Builder|null
    {
        return User::query()
                ->where('email', $email)
                ->first() ?? null;
    }

    /**
     * Возвращает все данные об активном пользователя
     * @return Builder|Model
     */
    public function getActiveUserData(): Model|Builder
    {
        return User::query()
            ->find(getUserId())
            ->first();
    }

    /**
     * Проверяет, существует ли пользователь (по Email)
     * @param string $email
     * @return bool
     */
    public function checkUserByEmail(string $email): bool
    {
        return User::query()->where('email', $email)->exists();
    }

    /**
     * Добавляет пользователя
     * @param string $name
     * @param string $email
     * @param string $password
     * @return Model|Builder
     */
    public function add(string $name, string $email, string $password): Model|Builder
    {
        /** @var User $user */
        $user = User::query()->create([
            'email' => $email,
            'name' => $name,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        return $user;
    }
}
