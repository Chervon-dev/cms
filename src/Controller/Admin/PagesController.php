<?php

namespace App\Controller\Admin;

use App\Config;
use App\View\View;

/**
 * Class PagesController
 * @package App\Controller\Admin
 */
class PagesController extends BaseController
{
    /**
     * @return View
     */
    public function showPage(): View
    {
        $paginationParams = Config::getInstance()
            ->getConfig('pagination.admin_panel.pages');

        return new View('admin.pages', [
            'paginationParams' => $paginationParams
        ]);
    }
}