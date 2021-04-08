<?php

namespace App\Controller\Admin;

use App\Config;
use App\View\View;

/**
 * Class SettingsController
 * @package App\Controller\Admin
 */
class SettingsController extends BaseController
{
    /**
     * @return View
     */
    public function settingsPage(): View
    {
        $paginationParams = Config::getInstance()
            ->getConfig('pagination.site');

        return new View('admin.settings', [
            'paginationParams' => $paginationParams
        ]);
    }
}