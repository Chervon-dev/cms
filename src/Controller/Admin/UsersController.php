<?php

namespace App\Controller\Admin;

use App\Config;
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
        $paginationParams = Config::getInstance()
            ->getConfig('pagination.admin_panel.users');

        return new View('admin.users', [
            'paginationParams' => $paginationParams
        ]);
    }
}