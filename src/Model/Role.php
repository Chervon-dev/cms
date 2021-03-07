<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App\Model
 */
class Role extends Model
{
    /**
     * @var string
     */
    protected $table = 'roles';

    /**
     * @var bool
     */
    public $timestamps = false;
}
