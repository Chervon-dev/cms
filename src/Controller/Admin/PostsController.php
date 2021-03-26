<?php

namespace App\Controller\Admin;

use App\Config;
use App\View\View;

/**
 * Class PostsController
 * @package App\Controller\Admin
 */
class PostsController
{
    /**
     * @return View
     */
    public function showPage(): View
    {
        $paginationParams = Config::getInstance()
            ->getConfig('pagination.admin_panel.posts');

        return new View('admin.posts', [
            'paginationParams' => $paginationParams
        ]);
    }
}