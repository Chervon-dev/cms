<?php

namespace App\Controller\Admin;

use App\View\View;

/**
 * Class UsersController
 * @package App\Controller\Admin
 */
class UsersController
{
    /**
     * @return View
     */
    public function showPage(): View
    {
        return new View('admin.users');
    }
}