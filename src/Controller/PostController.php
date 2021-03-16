<?php

namespace App\Controller;

use App\Exception\NotFoundException;
use App\Service\PostService;
use App\View\View;

/**
 * Контроллер для работы с постами
 * Class PostController
 * @package App\Controller
 */
class PostController
{
    /**
     * @var PostService
     */
    private PostService $postService;

    /**
     * MainController constructor.
     */
    public function __construct()
    {
        $this->postService = new PostService();
    }

    /**
     * Выводит страницу (Post)
     * @param string $alias
     * @return View
     * @throws NotFoundException
     */
    public function showPage(string $alias): View
    {
        $post = $this->postService->getByAlias($alias);

        return new View(
            'post',
            [
                'title' => 'Post',
                'post' => $post
            ]
        );
    }
}
