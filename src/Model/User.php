<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package App\Model
 */
class User extends Model
{
    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'password',
        'email',
        'about',
        'avatar',
        'role_id'
    ];
}
