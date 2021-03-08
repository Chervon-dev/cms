<?php

namespace App\Controller;

use App\Service\UserService;
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

    public function update()
    {
        var_dump($_POST, $_FILES);
    }
}
