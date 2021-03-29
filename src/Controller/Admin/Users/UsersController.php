<?php

namespace App\Controller\Admin\Users;

use App\Config;
use App\Controller\Admin\BaseController;
use App\View\View;

/**
 * Class UsersController
 * @package App\Controller\Admin\Users
 */
class UsersController extends BaseController
{
    /**
     * @return View
     */
    public function showPage(): View
    {
        /** @var Config $paginationParams */
        $paginationParams = Config::getInstance()
            ->getConfig('pagination.admin_panel.users');

        if ($this->role === 2) {
            return new View('admin.not-allowed');
        }

        return new View('admin.users', [
            'paginationParams' => $paginationParams
        ]);
    }
}