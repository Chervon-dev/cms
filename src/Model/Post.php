<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Model
 */
class Post extends Model
{
    /**
     * @var string
     */
    protected $table = 'posts';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title', 'alias', 'content',
        'description', 'author_id', 'date'
    ];
}