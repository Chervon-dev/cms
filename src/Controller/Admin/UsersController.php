<?php

namespace App\Controller\Admin;

use App\Config;
use App\View\View;

/**
 * Class UsersController
 * @package App\Controller\Admin
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