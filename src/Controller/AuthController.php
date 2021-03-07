<?php

namespace App\Controller;

use App\Validator\LoginValidator;
use App\Validator\SignupValidator;
use App\View\View;
use App\Service\UserService;
use App\Session;

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
     * @return string|null
     */
    public function registration(): ?string
    {
        // Инициализация переменных
        $name = strip_tags($_POST['name']);
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
        $confirmPassword = strip_tags($_POST['confirm_password']);
        $checkbox = $_POST['agree_with_the_site_rules'];

        // Валидатор
        $validator = new SignupValidator(
            $name, $email, $password,
            $confirmPassword, $checkbox
        );

        // Проверяет, если уже есть пользователь с таким Email
        if ($this->userService->checkUserByEmail($email)) {
            $validator->setError('email_isset');
        }

        // Валидация
        if (!$validator->validate()) {
            // Получение ошибок
            return $validator->getErrors();
        } else {
            // Добавление пользователя
            $user = $this->userService->add($name, $email, $password);
            Session::set('userId', $user->id);
        }

        // Получение данных об успехе
        return $validator->getSuccess();
    }

    /**
     * Выполняет валидацию данных и авторизует пользователя
     * @return string|null
     */
    public function login(): ?string
    {
        // Инициализация переменных
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);

        // Валидатор
        $validator = new LoginValidator($email, $password);

        // Данные пользователя или null
        $user = $this->userService->getDataByEmail($email);

        if (!$user->id) {
            $validator->setError('not-isset_email');

        } elseif (!password_verify($password, $user->password)) {
            $validator->setError('wrong_password');
        }

        // Валидация
        if (!$validator->validate()) {
            // Получение ошибок
            return $validator->getErrors();
        } else {
            Session::set('userId', $user['id']);
        }

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
