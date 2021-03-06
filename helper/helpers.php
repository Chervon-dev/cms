<?php

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
    return (bool)getActiveUserId();
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
 * Возвращает строку после первого вхождения символа
 * @param string $string
 * @param string $character
 * @return bool|string
 */
function getStringAfterCharacter(string $string, string $character): bool|string
{
    return substr(strrchr($string, $character), 1);
}

/**
 * Возвращает оттранслированную строку
 * @param $string
 * @return string|null
 */
function toTranslit($string): string|null
{
    $trans = [
        'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D',
        'Е' => 'E', 'Ё' => 'Jo', 'Ж' => 'Zh', 'З' => 'Z', 'И' => 'I',
        'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N',
        'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T',
        'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C', 'Ч' => 'Ch',
        'Ш' => 'Sh', 'Щ' => 'Shh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '',
        'Э' => 'Je', 'Ю' => 'Ju', 'Я' => 'Ja',

        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
        'е' => 'e', 'ё' => 'jo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
        'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
        'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
        'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
        'ш' => 'sh', 'щ' => 'shh', 'ъ' => '', 'ы' => 'y', 'ь' => '',
        'э' => 'je', 'ю' => 'ju', 'я' => 'ja'
    ];

    $url = strtr($string, $trans);
    $url = mb_strtolower($url);

    $url = preg_replace("/[^a-z0-9-s,]/i", "_", $url);
    $url = preg_replace("/[,-]/ui", " ", $url);

    return $url;
}

/**
 * Форматирует дату для вывода
 * @param $date
 * @param string $format
 * @return bool|string
 */
function formatDate($date, string $format): bool|string
{
    return date_format(date_create($date), $format);
}

/**
 * Возвращает, активна ли страница (для пагинации)
 * @param $page
 * @return string
 */
function getActiveClassForValidationByPage($page): string
{
    if ($page === 1 && !isset($_GET['page'])) {
        return 'active';
    }

    if (isset($_GET['page']) && $page == $_GET['page']) {
        return 'active';
    }

    return '';
}

/**
 * Возвращает, активна ли страница (для пагинации)
 * @param $page
 * @param $param
 * @return string
 */
function getSelectedClassForValidationByPage($page, $param): string
{
    if (isset($_GET['limit']) && $page == $_GET['limit']) {
        return 'selected';
    }

    if (!isset($_GET['limit']) && $page == $param) {
        return 'selected';
    }

    return '';
}

/**
 * @param string $param
 * @param $value
 * @return string
 */
function getParams(string $param, $value): string
{
    $params = $_GET;
    $params[$param] = $value;
    return '?' . http_build_query($params);
}