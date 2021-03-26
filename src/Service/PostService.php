<?php

namespace App\Service;

use App\Config;
use App\Exception\NotFoundException;
use App\Model\Post;
use App\View\View;
use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Сервис для работы с моделью Post
 * Class PostService
 * @package App\Service
 */
class PostService
{
    /**
     * Выводит страницу (Post)
     * @param string $alias
     * @return View
     * @throws NotFoundException
     */
    public function showPage(string $alias): View
    {
        $post = $this->getByAlias($alias);

        return new View(
            'post',
            [
                'title' => 'Post',
                'post' => $post
            ]
        );
    }

    /**
     * Возвращает последние посты
     * @return array
     */
    public function getLatestPosts(): array
    {
        return Post::query()
            ->orderBy('date', 'ASC')
            ->limit(COUNT_LATEST_POSTS)
            ->get()
            ->all();
    }

    /**
     * Возвращает нужное кол-во постов для вывода
     * @return LengthAwarePaginator
     */
    public function getListByPagination(): LengthAwarePaginator
    {
        $columns = [
            'id', 'title', 'alias', 'description',
            'author_id', 'img', 'date'
        ];

        $isPublish = function ($query) {
            $query->where('is_publish', 1);
        };

        $paginationConfig = Config::getInstance()
            ->getConfig('pagination.site.posts_per_page_default');

        return Post::query()
            ->select($columns)
            ->orderBy('date', 'ASC')
            ->with(['comments' => $isPublish, 'user'])
            ->paginate(
                $paginationConfig,
                ['*'],
                'page',
                $_GET['page'] ?? 1
            );
    }

    /**
     * Возвращает пост по переданному alias, иначе NotFoundException
     * @param string $alias
     * @return Model|Builder
     * @throws NotFoundException
     */
    public function getByAlias(string $alias): Model|Builder
    {
        $columns = [
            'id', 'title', 'content',
            'author_id', 'img', 'date'
        ];

        $isPublish = function ($query) {
            $query->where('is_publish', 1);
        };

        $post = Post::query()
            ->select($columns)
            ->where('alias', $alias)
            ->with(['comments' => $isPublish, 'user'])
            ->first();

        if (!is_null($post)) {
            return $post;
        }

        throw new NotFoundException();
    }
}
