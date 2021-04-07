<?php

namespace App\Service\Admin;

use App\Model\Role;

/**
 * Class RoleService
 * @package App\Service\Admin
 */
class RoleService
{
    /**
     * @return array
     */
    public function getAll(): array
    {
        return Role::query()
            ->select(['id', 'title'])
            ->get()
            ->all();
    }
}