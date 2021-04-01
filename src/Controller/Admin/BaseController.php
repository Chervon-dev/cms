<?php

namespace App\Controller\Admin;

use App\Service\UserService;

/**
 * Class BaseController
 * @package App\Controller\Admin
 */
abstract class BaseController
{
    /**
     * @var int
     */
    protected int $role;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        // Инициализация
        $userService = new UserService();
        $this->role = $userService->getActiveRoleId();

        if ($this->role === 3) {
            echo '<h3>You do not have access to this section.</h3>';
            exit();
        }
    }
}