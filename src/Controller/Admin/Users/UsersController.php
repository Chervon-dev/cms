<?php

namespace App\Controller\Admin\Users;

use App\Config;
use App\Controller\Admin\BaseController;
use App\Service\Admin\UserService;
use App\View\View;

/**
 * Class UsersController
 * @package App\Controller\Admin\Users
 */
class UsersController extends BaseController
{
    /**
     * @var UserService
     */
    private UserService $userService;

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->userService = new UserService();
    }

    /**
     * @return View
     */
    public function showPage(): View
    {
        return $this->userService->showUsersPage($this->role);
    }
}