<?php

namespace App;

/**
 * Класс для работу с сессиями
 * Class Session
 * @package App
 */
final class Session
{
    /**
     * Создает сессию
     */
    public static function start(): void
    {
        session_start();
    }

    /**
     * Возвращает значение из сессии
     * @param string $key - ключ
     * @return mixed - значение
     */
    public static function get(string $key): mixed
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        return null;
    }

    /**
     * Устанавливает значение в сессию
     * @param string $key - ключ
     * @param $value - значение
     */
    public static function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Устанавливает параметры сессии
     * @param int $time
     * @param string|null $path
     * @param string|null $domain
     * @param bool $secure
     * @param bool $httponly
     */
    public static function setParams(
        int $time,
        string|null $path = null,
        string|null $domain = null,
        bool|null $secure = null,
        bool|null $httponly = null): void
    {
        session_set_cookie_params($time, $path, $domain, $secure, $httponly);
    }

    /**
     * Уничтожает сессию
     */
    public static function destroy(): void
    {
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
    }
}
