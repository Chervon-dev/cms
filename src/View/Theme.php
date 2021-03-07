<?php

namespace App\View;

/**
 * Класс для работы с подключениями шаблонов
 * Class Theme
 * @package App\View
 */
class Theme
{
    /**
     * Подключает header c параметрами
     * @param string $title
     * @param bool $isAdmin
     * @param array $data
     * @return void
     */
    public function header(string $title = DEFAULT_TITLE, bool $isAdmin = false, array $data = []): void
    {
        $data['title'] = $title;
        $headerPath = $isAdmin ? 'layout/admin_header.php' : 'layout/header.php';
        includeView($headerPath, $data);
    }

    /**
     * Подключает footer c параметрами
     * @param bool $isAdmin
     * @param array $data
     * @return void
     */
    public function footer(bool $isAdmin = false, array $data = []): void
    {
        $footerPath = $isAdmin ? 'layout/admin_footer.php' : 'layout/footer.php';
        includeView($footerPath, $data);
    }

    /**
     * Подключает базовый header c параметрами
     * @param string $title
     * @param array $data
     * @return void
     */
    public function baseHeader(string $title = DEFAULT_TITLE, array $data = []): void
    {
        $data['title'] = $title;
        includeView('layout/base/header.php', $data);
    }

    /**
     * Подключает базовый footer c параметрами
     * @param array $data
     * @return void
     */
    public function baseFooter(array $data = []): void
    {
        includeView('layout/base/footer.php', $data);
    }

    /**
     * Подключает блок c параметрами
     * @param string $path
     * @param array $data
     * @return void
     */
    public function block(string $path, array $data = []): void
    {
        includeView('template/' . $path . '.php', $data);
    }
}
