<?php

namespace App\Controller\Admin\Users;

use App\Controller\Admin\BaseController;
use App\View\View;

/**
 * Class UserController
 * @package App\Controller\Admin\Users
 */
class UserController extends BaseController
{
    /**
     * @return View
     */
    public function createPage(): View
    {
        return new View('admin.create.user');
    }

    /**
     * @param int $id
     * @return View
     */
    public function changePage(int $id): View
    {
        return new View('admin.change.user');
    }
}