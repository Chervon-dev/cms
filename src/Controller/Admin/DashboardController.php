<?php

namespace App\Controller\Admin;

use App\View\View;

/**
 * Class DashboardController
 * @package App\Controller\Admin
 */
class DashboardController
{
    /**
     * @return View
     */
    public function showPage(): View
    {
        return new View('admin.index');
    }
}