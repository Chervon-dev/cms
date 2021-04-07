<?php

namespace App\Service\Admin;

use App\Config;
use App\Exception\NotFoundException;
use App\JsonResponse;
use App\Model\Role;
use App\Model\Subscription;
use App\Model\User;
use App\Validator\Admin\UserValidator;
use App\View\View;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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

    /**
     * @param int $id
     * @return array|Builder|Collection|Model
     * @throws NotFoundException
     */
    public function getDataById(int $id): Model|Collection|Builder|array
    {
        $columns = ['id', 'name', 'email', 'about', 'role_id'];
        $user = User::query()
            ->select($columns)
            ->find($id);

        if ($user) {
            $isSubscribe = Subscription::query()->where('email', $user->email)->exists();
            $user->setAttribute('isSubscribe', $isSubscribe);
            return $user;
        }

        throw new NotFoundException();
    }

    /**
     * @return JsonResponse
     */
    public function update(): JsonResponse
    {
        $id = (int)htmlspecialchars($_POST['id']);
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $about = htmlspecialchars($_POST['about']);
        $role = (int)htmlspecialchars($_POST['role']);
        $subscribe = htmlspecialchars($_POST['subscribe']);

        $data = [
            'name' => $name,
            'email' => $email,
            'about' => $about,
            'role_id' => $role
        ];

        // Валидатор
        $validator = new UserValidator($data);

        // Валидация
        if (!$validator->rules()) {
            return $validator->getErrors();
        }

        if ($password !== '') {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        User::query()->find($id)->update($data);
        $emailSubscription = Subscription::query()->where('email', $email);

        if ($subscribe === 'false') {
            $emailSubscription->delete();

        } elseif (!$emailSubscription->exists()) {
            Subscription::query()->insert([
                'email' => $email
            ]);
        }

        return $validator->getSuccess();
    }
}