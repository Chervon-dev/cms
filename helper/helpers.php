<?php

use App\Model\Subscription;
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
    return (bool) getActiveUserId();
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
 * @return string|null
 */
function getActiveEmail(): ?string
{
    $userService = new UserService();
    return $userService->getById(getActiveUserId())->email ?? null;
}

/**
 * Возвращает Email активного пользователя
 * @return string|null
 */
function getActiveUserId(): ?string
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

/**
 * Проверяет, подписан ли пользователь (по Email)
 * @param string $email
 * @return bool
 */
function checkSubscribeByEmail(string $email): bool
{
    return Subscription::query()->where('email', $email)->exists();
}

/**
 * Возвращает строку после первого вхождения символа
 * @param string $string
 * @param string $character
 * @return bool|string
 */
function getStringAfterCharacter(string $string, string $character): bool|string
{
    return substr(strrchr($string, $character), 1);
}