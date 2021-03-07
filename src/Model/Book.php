<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 * @package App\Model
 */
class Book extends Model
{
    /**
     * @var string
     */
    protected $table = 'books';

    /**
     * @var bool
     */
    public $timestamps = false;
}
