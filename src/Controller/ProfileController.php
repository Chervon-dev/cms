<?php

namespace App\Controller;

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
     */
    public function showPage(): View
    {
        return new View(
            'profile',
            [
                'title' => 'Personal Area',
                // Данные об активном пользователе
                'user' => $this->userService->getActiveUserData()
            ]
        );
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
     * @return string|null
     */
    public function updateAvatar(): ?string
    {
        $avatar = $_FILES['avatar'];
        $userId = $_POST['userId'];
        $tmp_name = $avatar['tmp_name'];
        $name = $avatar['name'];

        // Валидатор
        $validator = new AvatarValidator($_FILES);

        // Валидация
        if (!$validator->rules()) {
            return $validator->getErrors();
        }

        // Загрузка аватара на сервер
        $this->uploadAvatar($userId, $name, $tmp_name);

        // Загрузка аватара на сервер
        $this->userService->updateAvatar((int) $userId, $name);

        return $validator->getSuccess();
    }

    /**
     * Загружаешь аватар на сервер
     * @param string $userId
     * @param string $name
     * @param string $tmpName
     * @return void
     */
    private function uploadAvatar(string $userId, string $name, string $tmpName): void
    {
        // upload avatar code
    }
}
