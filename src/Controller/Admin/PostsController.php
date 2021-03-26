<?php

namespace App\Controller\Admin;

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
        return new View('admin.posts');
    }
}