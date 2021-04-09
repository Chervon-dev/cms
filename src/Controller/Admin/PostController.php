<?php

namespace App\Controller\Admin;

use App\Config;
use App\Service\Admin\PostService;
use App\View\View;

/**
 * Class PostController
 * @package App\Controller\Admin\Users
 */
class PostController extends BaseController
{
    /**
     * @var PostService
     */
    private PostService $postService;

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->postService = new PostService();
    }

    /**
     * @return View
     */
    public function postsPage(): View
    {
        return $this->postService->showPostsPage();
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