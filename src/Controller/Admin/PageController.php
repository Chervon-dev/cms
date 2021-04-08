<?php

namespace App\Controller\Admin;

use App\Config;
use App\View\View;

/**
 * Class PageController
 * @package App\Controller\Admin\Users
 */
class PageController extends BaseController
{
    /**
     * @return View
     */
    public function pagesPage(): View
    {
        $paginationParams = Config::getInstance()
            ->getConfig('pagination.admin_panel.pages');

        return new View('admin.pages', [
            'paginationParams' => $paginationParams
        ]);
    }

    /**
     * @return View
     */
    public function createPage(): View
    {
        return new View('admin.create.page');
    }

    /**
     * @param int $id
     * @return View
     */
    public function changePage(int $id): View
    {
        return new View('admin.change.page');
    }
}