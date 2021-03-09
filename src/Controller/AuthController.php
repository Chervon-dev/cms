<?php

namespace App\Controller;

use App\Session;
use App\View\View;
use App\Model\User;
use App\JsonResponse;
use App\Service\UserService;
use App\Validator\LoginValidator;
use App\Validator\SignupValidator;

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
        $data = [
            'name' => strip_tags($_POST['name']),
            'email' => strip_tags($_POST['email']),
            'password' => strip_tags($_POST['password']),
            'confirm_password' => strip_tags($_POST['confirm_password']),
            'checkbox' => $_POST['agree_with_the_site_rules'],
        ];

        // Валидатор
        $validator = new SignupValidator($data);

        // Валидация
        if (!$validator->rules()) {
            // Получение ошибок
            return $validator->getErrors();
        }

        // Добавление пользователя
        $user = $this->userService->add(
            $data['name'],
            $data['email'],
            $data['password']
        );

        // Обновляется сессия
        Session::set('userId', $user->id);

        // Получение данных об успехе
        return $validator->getSuccess();
    }

    /**
     * Выполняет валидацию данных и авторизует пользователя
     * @return JsonResponse
     */
    public function login(): JsonResponse
    {
        $data = [
            'email' => strip_tags($_POST['email']),
            'password' => strip_tags($_POST['password']),
        ];

        // Валидатор
        $validator = new LoginValidator($data);

        /** @var User $user */
        $user = $this->userService->getByEmail($data['email']);

        if (!isset($user->id)) {
            $validator->setError('not-isset_email');

        } elseif (!password_verify($data['password'], $user->password)) {
            $validator->setError('wrong_password');
        }

        // Валидация
        if (!$validator->rules()) {
            // Получение ошибок
            return $validator->getErrors();
        }

        // Обновляется сессия
        Session::set('userId', $user->id);

        // Получение данных об успехе
        return $validator->getSuccess();
    }

    /**
     * Очищает сессии и деавторизирует пользователя
     * @return void
     */
    public function logout(): void
    {
        Session::destroy();
        header('location: /');
    }
}
