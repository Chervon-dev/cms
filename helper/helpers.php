<?php

use App\Service\UserService;
use App\Session;
use App\View\Theme;

/**
 * Подключает шаблон (View)
 * @param $viewPath
 * @param array $data
 */
function includeView($viewPath, $data = []): void
{
    extract($data);
    $theme = new Theme();
    include APP_DIR . VIEW_DIR . $viewPath;
}

/**
 * Возвращает данные из массива с переданным ключем
 * @param array $array
 * @param string $key
 * @param null $default
 * @return mixed
 */
function array_get(array $array, string $key, $default = null): mixed
{
    $nesting = explode('.', $key);
    $firstKey = array_shift($nesting);

    if (!isset($array[$firstKey])) {
        return $default;
    }

    if (empty($nesting)) {
        return $array[$firstKey];
    }

    return array_get($array[$firstKey], implode('.', $nesting));
}

/**
 * Проверяет, авторизован ли пользователь
 * @return bool
 */
function isAuthorized(): bool
{
    $userId = Session::get('userId');
    return isset($userId);
}

/**
 * Проверяет, находиться ли пользователь
 * на странице аутентификации
 * @return bool
 */
function isAuthPage(): bool
{
    return $_SERVER['REQUEST_URI'] == '/auth/login'
        || $_SERVER['REQUEST_URI'] == '/auth/signup';
}

/**
 * Возвращает Email активного пользователя
 * @return string
 */
function getActiveEmail(): string
{
    $userService = new UserService();
    return $userService->getActiveUserData()->email;
}

/**
 * Возвращает Email активного пользователя
 * @return string
 */
function getUserId(): string
{
    return Session::get('userId');
}

/**
 * Проверяет, активен ли переданный URI
 * @param string $uri
 * @return bool
 */
function isActivePage(string $uri): bool
{
    return $_SERVER['REQUEST_URI'] === $uri;
}

/**
 * Проверяет, правильность Email
 * @param string $email
 * @return bool
 */
function isTrueEmailAddress(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
