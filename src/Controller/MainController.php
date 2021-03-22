<?php

namespace App\Controller;

use App\Service\MainPageService;
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
     * @var MainPageService
     */
    private MainPageService $mainPageService;

    /**
     * MainController constructor.
     */
    public function __construct()
    {
        $this->postService = new PostService();
        $this->mainPageService = new MainPageService();
    }

    /**
     * Выводит страницу (Index)
     * @return View
     */
    public function showPage(): View
    {
        return $this->mainPageService->showPage($this->postService);
    }
}
