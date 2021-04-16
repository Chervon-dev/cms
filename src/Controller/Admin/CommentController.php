<?php

namespace App\Controller\Admin;

use App\JsonResponse;
use App\Service\Admin\CommentService;
use App\View\View;

/**
 * Class CommentController
 * @package App\Controller\Admin\Posts
 */
class CommentController extends BaseController
{
    /**
     * @var CommentService
     */
    private CommentService $commentService;

    /**
     * CommentController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->commentService = new CommentService();
    }

    /**
     * @param int $postId
     * @return View
     */
    public function createPage(int $postId): View
    {
        return new View('admin.create.comment');
    }

    /**
     * @param int $id
     * @return View
     */
    public function changePage(int $id): View
    {
        $comment = $this->commentService->getById($id);
        return new View('admin.change.comment',
            [
                'comment' => $comment
            ]
        );
    }

    /**
     * @return JsonResponse
     */
    public function change(): JsonResponse
    {
        return $this->commentService->change();
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function delete(): void
    {
        $this->commentService->delete();
    }

    /**
     * @return JsonResponse
     */
    public function create(): JsonResponse
    {
        return $this->commentService->create();
    }
}