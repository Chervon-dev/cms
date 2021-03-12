<?php

namespace App\Service;

use App\Model\Role;
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
    public function getByEmail(string $email): Model|Builder|null
    {
        return User::query()
                ->where('email', $email)
                ->first() ?? null;
    }

    /**
     * Возвращает все данные об активном пользователя
     * @param string|int $id
     * @return Builder|Model|null
     */
    public function getById(string|int $id): Model|Builder|null
    {
        $user = User::query()->find($id);

        if ($user) {
            $role = Role::query()->find($user->role_id);
            $user->setAttribute('role', $role->title);
            return $user;
        }

        return null;
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

    /**
     * Обновляет данные пользователя
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $about
     * @return void
     */
    public function updateData(
        int $id,
        string $name,
        string $email,
        string $password,
        string $about): void
    {
        $update = [
            'name' => $name,
            'email' => $email,
            'about' => $about,
        ];

        if ($password !== '') {
            $update['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        User::query()->find($id)->update($update);
    }

    /**
     * Обновляет аватар пользователя
     * @param int $id
     * @param string $avatar
     * @return void
     */
    public function updateAvatar(int $id, string $avatar): void
    {
        User::query()->find($id)->update([
            'avatar' => $avatar
        ]);
    }
}
