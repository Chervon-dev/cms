<?php

namespace App\Controller\Admin\Posts;

use App\Config;
use App\Controller\Admin\BaseController;
use App\View\View;

/**
 * Class PostsController
 * @package App\Controller\Admin\Posts
 */
class PostsController extends BaseController
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