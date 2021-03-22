<?php

namespace App\Service;

use App\Exception\NotFoundException;
use App\JsonResponse;
use App\Model\User;
use App\Validator\AvatarValidator;
use App\Validator\ProfileValidator;
use App\View\View;
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
     * Обновляет данные о пользователе
     * @return JsonResponse
     */
    public function update(): JsonResponse
    {
        $data = [
            'id' => (int)$_POST['userId'],
            'name' => strip_tags($_POST['name']),
            'email' => strip_tags($_POST['email']),
            'password' => strip_tags($_POST['password']),
            'about' => strip_tags($_POST['about']),
        ];

        // Валидатор
        $validator = new ProfileValidator($data);

        // Валидация
        if (!$validator->rules()) {
            return $validator->getErrors();
        }

        // Обновление данных в БД
        $this->updateData(
            $data['id'],
            $data['name'],
            $data['email'],
            $data['password'],
            $data['about']
        );

        return $validator->getSuccess();
    }

    /**
     * Обновляет аватар пользователя
     * @return JsonResponse
     */
    public function updateAvatar(): JsonResponse
    {
        $userId = $_POST['userId'];
        $tmp_name = $_FILES['avatar']['tmp_name'];

        // Валидатор
        $validator = new AvatarValidator($_FILES);

        // Валидация
        if (!$validator->rules()) {
            return $validator->getErrors();
        }

        // Загружает аватар на сервер и возвращает имя загруженного файла
        $avatarName = $this->uploadAvatar($userId, $tmp_name);

        // Загрузка аватара на сервер
        $this->insertAvatar((int) $userId, $avatarName);

        return $validator->getSuccess();
    }

    /**
     * Загружаешь аватар на сервер
     * @param string $userId
     * @param string $tmpName
     * @return string
     */
    public function uploadAvatar(string $userId, string $tmpName): string
    {
        $name = $userId . '.jpg';
        move_uploaded_file($tmpName, AVATAR_DIR . $name);
        return $name;
    }

    /**
     * Выводит страницу (user-info)
     * @param int $id
     * @return View
     * @throws NotFoundException
     */
    public function show(int $id): View
    {
        /** @var Model $user */
        $userData = $this->getById($id);

        if ($userData) {
            return new View(
                'user-info',
                [
                    'title' => $userData->name,
                    // Данные о пользователе
                    'user' => $userData
                ]
            );
        }

        throw new NotFoundException();
    }

    /**
     * Выводит страницу (Profile)
     * @return View
     * @throws NotFoundException
     */
    public function me(): View
    {
        /** @var Model $user */
        $user = $this->getById(
            getActiveUserId()
        );

        if ($user) {
            return new View(
                'profile',
                [
                    'title' => 'Personal Area',
                    // Данные об активном пользователе
                    'user' => $user
                ]
            );
        }

        throw new NotFoundException();
    }

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
        $data = User::query()->find($id);
        return $data ?? null;
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
    public function insertAvatar(int $id, string $avatar): void
    {
        User::query()->find($id)->update([
            'avatar' => $avatar
        ]);
    }
}
