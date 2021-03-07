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
     * @param $id
     * @return View
     */
    public function showPagePost($id): View
    {
        return new View('post', ['title' => 'Post', 'id' => $id]);
    }
}
