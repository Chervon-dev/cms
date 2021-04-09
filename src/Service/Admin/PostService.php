<?php

namespace App\Service\Admin;

use App\Config;
use App\Exception\NotFoundException;
use App\JsonResponse;
use App\Model\Comment;
use App\Model\Post;
use App\Model\Role;
use App\Model\Subscription;
use App\Model\User;
use App\Validator\Admin\PostValidator;
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
     * @param int $id
     * @return View
     * @throws NotFoundException
     */
    public function showChangePage(int $id): View
    {
        $post = $this->getDataById($id);
        $comments = $this->getCommentsById($id);
        $paginationParams = Config::getInstance()
            ->getConfig('pagination.admin_panel.comments');

        return new View('admin.change.post', [
            'paginationParams' => $paginationParams,
            'post' => $post,
            'comments' => $comments
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

    /**
     * @param int $id
     * @return array|Builder|Collection|Model
     * @throws NotFoundException
     */
    public function getDataById(int $id): Model|Collection|Builder|array
    {
        $columns = ['id', 'title', 'description', 'content', 'img'];
        $post = Post::query()
            ->select($columns)
            ->find($id);

        if ($post) {
            return $post;
        }

        throw new NotFoundException();
    }

    /**
     * @param int $id
     * @return LengthAwarePaginator
     */
    public function getCommentsById(int $id): LengthAwarePaginator
    {
        $columns = [
            'id', 'author_id', 'date', 'is_publish'
        ];

        $paginationConfig = Config::getInstance()
            ->getConfig('pagination.admin_panel.comments.per_page_default');

        $comments = Comment::query()
            ->select($columns)
            ->where('post_id', $id)
            ->paginate(
                $_GET['limit'] ?? $paginationConfig,
                ['*'],
                'page',
                $_GET['page'] ?? 1
            );

        foreach ($comments as $comment) {
            $author = User::query()->find($comment->author_id);
            $comment->setAttribute('author', $author->name);
        }

        return $comments;
    }

    /**
     * @return JsonResponse
     */
    public function update(): JsonResponse
    {
        $id = (int)htmlspecialchars($_POST['id']);
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $content = htmlspecialchars($_POST['content']);

        $data = [
            'title' => $title,
            'description' => $description,
            'content' => $content
        ];

        if (isset($_FILES['img'])) {
            $data['img'] = $_FILES['img'];
        }

        // Валидатор
        $validator = new PostValidator($data);

        // Валидация
        if (!$validator->rules()) {
            return $validator->getErrors();
        }

        if (isset($data['img'])) {
            $tmpName = $data['img']['tmp_name'];
            $data['img'] = $this->uploadImage($id, $tmpName);
        }

        $data['alias'] = toTranslit($title);
        Post::query()->find($id)->update($data);
        return $validator->getSuccess();
    }

    /**
     * Загружаешь картинку на сервер
     * @param string $postId
     * @param string $tmpName
     * @return string
     */
    private function uploadImage(string $postId, string $tmpName): string
    {
        $name = $postId . '.jpg';
        move_uploaded_file($tmpName, POST_IMAGE_DIR . $name);
        return $name;
    }

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