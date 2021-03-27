<?php

namespace App\Controller\Admin;

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
    public function showPage(): View
    {
        return new View('admin.settings');
    }
}