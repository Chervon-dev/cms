<?php

namespace App\Controller;

use App\Service\PostService;
use App\View\View;

/**
 * Контроллер для работы с главной страницей
 * Class MainController
 * @package App\Controller
 */
class MainController
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
     * Выводит страницу (Index)
     * @return View
     */
    public function showPage(): View
    {
        $paginator = $this->postService->getListByPagination();

        return new View(
            'index',
            [
                'title' => DEFAULT_TITLE,
                'paginator' => $paginator,
                'posts' => $paginator->items(),
            ]
        );
    }
}
