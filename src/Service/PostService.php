<?php

namespace App\Service;

use App\Model\Post;

/**
 * Class PostService
 * @package App\Service
 */
class PostService
{
    /**
     * @return array
     */
    public function getLatestPosts(): array
    {
        return Post::query()
            ->orderBy('date', 'ASC')
            ->limit(3)
            ->get()
            ->all();
    }
}