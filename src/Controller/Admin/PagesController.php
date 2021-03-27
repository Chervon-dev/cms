<?php

namespace App\Controller\Admin;

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
        return new View('admin.pages');
    }
}