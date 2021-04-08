<?php

namespace App\Controller\Admin;

use App\View\View;

/**
 * Class DashboardController
 * @package App\Controller\Admin
 */
class DashboardController extends BaseController
{
    /**
     * @return View
     */
    public function dashboardPage(): View
    {
        return new View('admin.index');
    }
}