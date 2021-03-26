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
        $headerPath = $isAdmin ? 'layout/admin/header.php' : 'layout/header.php';
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
        $footerPath = $isAdmin ? 'layout/admin/footer.php' : 'layout/footer.php';
        includeView($footerPath, $data);
    }

    /**
     * Подключает кастомный header c параметрами
     * @param string $path
     * @param string $title
     * @param array $data
     * @return void
     */
    public function customHeader(string $path, string $title = DEFAULT_TITLE, array $data = []): void
    {
        $data['title'] = $title;
        $path = 'layout/' . $path . '/header.php';
        includeView($path, $data);
    }

    /**
     * Подключает кастомный footer c параметрами
     * @param string $path
     * @param array $data
     * @return void
     */
    public function customFooter(string $path, array $data = []): void
    {
        $path = 'layout/' . $path . '/footer.php';
        includeView($path, $data);
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
