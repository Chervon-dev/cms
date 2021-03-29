<?php

namespace App\Controller\Admin\Pages;

use App\Config;
use App\Controller\Admin\BaseController;
use App\View\View;

/**
 * Class PagesController
 * @package App\Controller\Admin\Pages
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