<?php

namespace App\Controller;

use App\View\View;
use App\JsonResponse;
use App\Service\UserService;

/**
 * Контроллер для работы с аутентификацией
 * Class AuthController
 * @package App\Controller
 */
class AuthController
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
     * Выводит страницу (Login)
     * @return View
     */
    public function showPageLogin(): View
    {
        return new View('auth.login', ['title' => 'Login']);
    }

    /**
     * Выводит страницу (Signup)
     * @return View
     */
    public function showPageSignup(): View
    {
        return new View('auth.signup', ['title' => 'Sign up']);
    }

    /**
     * Выполняет валидацию данных и регестрирует пользователя
     * @return JsonResponse
     */
    public function registration(): JsonResponse
    {
        return $this->userService->registration();
    }

    /**
     * Выполняет валидацию данных и авторизует пользователя
     * @return JsonResponse
     */
    public function login(): JsonResponse
    {
        return $this->userService->login();
    }

    /**
     * Очищает сессии и деавторизирует пользователя
     * @return void
     */
    public function logout(): void
    {
        $this->userService->logout();
    }
}
