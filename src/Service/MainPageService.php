<?php

namespace App\Service;

use App\View\View;

/**
 * Class MainPageService
 * @package App\Service
 */
class MainPageService
{
    /**
     * Выводит страницу (Index)
     * @param PostService $postService
     * @return View
     */
    public function showPage(PostService $postService): View
    {
        $paginator = $postService->getListByPagination();

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