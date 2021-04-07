<?php

namespace App\Controller\Admin\Users;

use App\Controller\Admin\BaseController;
use App\Exception\NotFoundException;
use App\JsonResponse;
use App\Service\Admin\RoleService;
use App\Service\Admin\UserService;
use App\View\View;

/**
 * Class UserController
 * @package App\Controller\Admin\Users
 */
class UserController extends BaseController
{
    /**
     * @var UserService
     */
    private UserService $userService;

    /**
     * @var RoleService
     */
    private RoleService $roleService;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->userService = new UserService();
        $this->roleService = new RoleService();
    }

    /**
     * @return View
     */
    public function createPage(): View
    {
        $roles = $this->roleService->getAll();

        return new View(
            'admin.create.user',
            [
                'roles' => $roles
            ]
        );
    }

    /**
     * @param int $id
     * @return View
     * @throws NotFoundException
     */
    public function changePage(int $id): View
    {
        $user = $this->userService->getDataById($id);
        $roles = $this->roleService->getAll();

        return new View(
            'admin.change.user',
            [
                'user' => $user,
                'roles' => $roles
            ]
        );
    }

    /**
     * @return JsonResponse
     */
    public function change(): JsonResponse
    {
        return $this->userService->update();
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function delete(): void
    {
        $this->userService->delete();
    }

    /**
     * @return JsonResponse
     */
    public function create(): JsonResponse
    {
        return $this->userService->create();
    }
}