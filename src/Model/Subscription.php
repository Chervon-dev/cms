<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Subscription
 * @package App\Model
 */
class Subscription extends Model
{
    /**
     * @var string
     */
    protected $table = 'subscriptions';

    /**
     * @var bool
     */
    public $timestamps = false;
}
