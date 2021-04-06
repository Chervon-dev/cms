<?php

namespace App\Service\Admin;

use App\Config;
use App\Model\Role;
use App\Model\User;
use App\View\View;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class UserService
 * @package App\Service\Admin
 */
class UserService
{
    /**
     * @param int $role
     * @return View
     */
    public function showUsersPage(int $role): View
    {
        $users = $this->getAll();

        /** @var Config $paginationParams */
        $paginationParams = Config::getInstance()
            ->getConfig('pagination.admin_panel.users');

        if ($role === 2) {
            return new View('admin.not-allowed');
        }

        return new View('admin.users', [
            'paginationParams' => $paginationParams,
            'users' => $users
        ]);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator
    {
        $columns = [
            'id', 'name', 'email', 'role_id'
        ];

        $paginationConfig = Config::getInstance()
            ->getConfig('pagination.admin_panel.users.per_page_default');

        $users = User::query()
            ->select($columns)
            ->paginate(
                $_GET['limit'] ?? $paginationConfig,
                ['*'],
                'page',
                $_GET['page'] ?? 1
            );

        foreach ($users as $user) {
            $role = Role::query()->find($user->role_id);
            $user->setAttribute('role', $role->title);
        }

        return $users;
    }
}