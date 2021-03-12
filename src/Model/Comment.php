<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package App\Model
 */
class Comment extends Model
{
    /**
     * @var string
     */
    protected $table = 'comments';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = ['text', 'author_id', 'date'];
}
