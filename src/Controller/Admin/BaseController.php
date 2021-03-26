<?php

namespace App\Controller\Admin;

use App\Exception\NotFoundException;
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
     * @var string
     */
    protected string $avatar;

    /**
     * @var string
     */
    protected string $name;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $userService = new UserService();
        $userData = $userService->getAllById(getActiveUserId());

        // Инициализация
        $this->role = $userData->role_id;

        if ($this->role === 3) {
            echo '<h3>You do not have access to this section.</h3>';
            exit();
        }
        
        $this->avatar = $userData->avatar;
        $this->name = $userData->name;
    }
}