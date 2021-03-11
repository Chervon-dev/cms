<?php

namespace App\Controller;

use App\Exception\NotFoundException;
use App\JsonResponse;
use App\Service\UserService;
use App\Validator\AvatarValidator;
use App\Validator\ProfileValidator;
use App\View\View;

/**
 * Контроллер для работы с профилем (ЛК)
 * Class ProfileController
 * @package App\Controller
 */
class ProfileController
{
    /**
     * @var UserService
     */
    private UserService $userService;

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->userService = new UserService();
    }

    /**
     * Выводит страницу (Profile)
     * @return View
     * @throws NotFoundException
     */
    public function showPageProfile(): View
    {
        $userData = $this->userService->getById(
            getActiveUserId()
        );

        if ($userData) {
            return new View(
                'profile',
                [
                    'title' => 'Personal Area',
                    // Данные об активном пользователе
                    'user' => $userData
                ]
            );
        }

        throw new NotFoundException();
    }

    /**
     * Выводит страницу (user-info)
     * @param string|int $id
     * @return View
     * @throws NotFoundException
     */
    public function showPageUserInfo(string|int $id): View
    {
        $userData = $this->userService->getById($id);

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
     * Обновляет данные о пользователе
     * @return JsonResponse
     */
    public function updateData(): JsonResponse
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
        $this->userService->updateData(
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
        $this->userService->updateAvatar((int) $userId, $avatarName);

        return $validator->getSuccess();
    }

    /**
     * Загружаешь аватар на сервер
     * @param string $userId
     * @param string $tmpName
     * @return string
     */
    private function uploadAvatar(string $userId, string $tmpName): string
    {
        $name = $userId . '.jpg';
        move_uploaded_file($tmpName, AVATAR_DIR . $name);
        return $name;
    }
}
