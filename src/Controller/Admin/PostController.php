<?php

namespace App\Controller\Admin;

use App\Config;
use App\View\View;

/**
 * Class PostController
 * @package App\Controller\Admin\Users
 */
class PostController extends BaseController
{
    /**
     * @return View
     */
    public function postsPage(): View
    {
        $paginationParams = Config::getInstance()
            ->getConfig('pagination.admin_panel.posts');

        return new View('admin.posts', [
            'paginationParams' => $paginationParams
        ]);
    }

    /**
     * @return View
     */
    public function createPage(): View
    {
        return new View('admin.create.post');
    }

    /**
     * @param int $id
     * @return View
     */
    public function changePage(int $id): View
    {
        $paginationParams = Config::getInstance()
            ->getConfig('pagination.admin_panel.comments');

        return new View('admin.change.post', [
            'paginationParams' => $paginationParams
        ]);
    }
}