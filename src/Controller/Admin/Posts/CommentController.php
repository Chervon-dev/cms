<?php


namespace App\Controller\Admin\Posts;

use App\Controller\Admin\BaseController;
use App\View\View;

/**
 * Class CommentController
 * @package App\Controller\Admin\Posts
 */
class CommentController extends BaseController
{
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
        return new View('admin.change.comment');
    }
}