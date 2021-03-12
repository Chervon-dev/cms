<?php

namespace App\Controller;

use App\Service\CategoryService;
use App\View\View;

/**
 * Контроллер для работы с главной страницей
 * Class MainController
 * @package App\Controller
 */
class MainController
{
    /**
     * @var CategoryService
     */
    private CategoryService $categoryService;

    /**
     * MainController constructor.
     */
    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }

    /**
     * Выводит страницу (Index)
     * @return View
     */
    public function showPage(): View
    {
        $categories = $this->categoryService->getAll();
        return new View(
            'index',
            [
                'title' => DEFAULT_TITLE,
                'categories' => $categories
            ]
        );
    }
}
