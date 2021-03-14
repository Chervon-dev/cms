<?php

namespace App\Controller;

use App\View\View;

/**
 * Контроллер для работы с постами
 * Class PostController
 * @package App\Controller
 */
class PostController
{
    /**
     * Выводит страницу (Post)
     * @param string $alias
     * @return View
     */
    public function showPage(string $alias): View
    {
        return new View('post', ['title' => 'Post', 'alias' => $alias]);
    }
}
