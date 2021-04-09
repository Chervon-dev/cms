<?php

namespace App\Controller\Admin;

use App\Config;
use App\Exception\NotFoundException;
use App\JsonResponse;
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
     * @throws NotFoundException
     */
    public function changePage(int $id): View
    {
        return $this->postService->showChangePage($id);
    }

    /**
     * @return JsonResponse
     */
    public function change(): JsonResponse
    {
        return $this->postService->update();
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function delete(): void
    {
        $this->postService->delete();
    }

    /**
     * @return JsonResponse
     */
    public function create(): JsonResponse
    {
        return $this->postService->create();
    }
}