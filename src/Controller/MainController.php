<?php

namespace App\Controller;

use App\View\View;

/**
 * Контроллер для работы с главной страницей
 * Class MainController
 * @package App\Controller
 */
class MainController
{
    /**
     * Выводит страницу (Index)
     * @return View
     */
    public function showPage(): View
    {
        return new View('index', ['title' => DEFAULT_TITLE]);
    }
}
