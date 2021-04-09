<?php

namespace App\Service\Admin;

use App\Config;
use App\Exception\NotFoundException;
use App\JsonResponse;
use App\Model\Post;
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
 * Class PostService
 * @package App\Service\Admin
 */
class PostService
{
    /**
     * @return View
     */
    public function showPostsPage(): View
    {
        $posts = $this->getAll();

        /** @var Config $paginationParams */
        $paginationParams = Config::getInstance()
            ->getConfig('pagination.admin_panel.posts');

        return new View('admin.posts', [
            'paginationParams' => $paginationParams,
            'posts' => $posts
        ]);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator
    {
        $columns = [
            'id', 'title', 'author_id', 'alias', 'date'
        ];

        $paginationConfig = Config::getInstance()
            ->getConfig('pagination.admin_panel.posts.per_page_default');

        $posts = Post::query()
            ->select($columns)
            ->paginate(
                $_GET['limit'] ?? $paginationConfig,
                ['*'],
                'page',
                $_GET['page'] ?? 1
            );

        foreach ($posts as $post) {
            $author = User::query()->find($post->author_id);
            $post->setAttribute('author', $author->name);
        }

        return $posts;
    }

//    /**
//     * @param int $id
//     * @return array|Builder|Collection|Model
//     * @throws NotFoundException
//     */
//    public function getDataById(int $id): Model|Collection|Builder|array
//    {
//        $columns = ['id', 'name', 'email', 'about', 'role_id'];
//        $user = User::query()
//            ->select($columns)
//            ->find($id);
//
//        if ($user) {
//            $isSubscribe = Subscription::query()->where('email', $user->email)->exists();
//            $user->setAttribute('isSubscribe', $isSubscribe);
//            return $user;
//        }
//
//        throw new NotFoundException();
//    }
//
//    /**
//     * @return JsonResponse
//     */
//    public function update(): JsonResponse
//    {
//        $id = (int)htmlspecialchars($_POST['id']);
//        $name = htmlspecialchars($_POST['name']);
//        $email = htmlspecialchars($_POST['email']);
//        $password = htmlspecialchars($_POST['password']);
//        $about = htmlspecialchars($_POST['about']);
//        $role = (int)htmlspecialchars($_POST['role']);
//        $subscribe = htmlspecialchars($_POST['subscribe']);
//
//        $data = [
//            'name' => $name,
//            'email' => $email,
//            'about' => $about,
//            'role_id' => $role
//        ];
//
//        // Валидатор
//        $validator = new UserValidator($data);
//
//        $issetEmail = User::query()->where('email', $email)->exists();
//        if ($issetEmail && $this->getEmailById($id) !== $email) {
//            $validator->setError('isset_email');
//        }
//
//        // Валидация
//        if (!$validator->rules()) {
//            return $validator->getErrors();
//        }
//
//        if ($password != '') {
//            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
//        }
//
//        User::query()->find($id)->update($data);
//
//        $emailSubscription = Subscription::query()->where('email', $email);
//        if ($subscribe === 'false') {
//            $emailSubscription->delete();
//
//        } elseif (!$emailSubscription->exists()) {
//            Subscription::query()->insert([
//                'email' => $email
//            ]);
//        }
//
//        return $validator->getSuccess();
//    }
//
//    /**
//     * @return JsonResponse
//     */
//    public function create(): JsonResponse
//    {
//        $name = htmlspecialchars($_POST['name']);
//        $email = htmlspecialchars($_POST['email']);
//        $password = htmlspecialchars($_POST['password']);
//        $about = htmlspecialchars($_POST['about']);
//        $role = (int)htmlspecialchars($_POST['role']);
//        $subscribe = htmlspecialchars($_POST['subscribe']);
//
//        $data = [
//            'name' => $name,
//            'email' => $email,
//            'about' => $about,
//            'role_id' => $role,
//            'password' => $password,
//            'avatar' => 'default.jpg'
//        ];
//
//        // Валидатор
//        $validator = new UserValidator($data);
//
//        $issetEmail = User::query()->where('email', $email)->exists();
//        if ($issetEmail) {
//            $validator->setError('isset_email');
//        }
//
//        // Валидация
//        if (!$validator->rules()) {
//            return $validator->getErrors();
//        }
//
//        if ($subscribe === 'true') {
//            Subscription::query()->insert(['email' => $email]);
//        }
//
//        $data['password'] = password_hash($password, PASSWORD_DEFAULT);
//        User::query()->insert($data);
//        return $validator->getSuccess();
//    }
//
//    /**
//     * @return void
//     * @throws \Exception
//     */
//    public function delete()
//    {
//        $id = $_POST['id'];
//        User::query()->find($id)->delete();
//    }
}