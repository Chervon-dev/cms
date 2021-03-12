<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Model
 */
class Category extends Model
{
    /**
     * @var string
     */
    protected $table = 'categories';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = ['name'];
}
