<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Модель для таблицы comments
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

    /**
     * Связь один ко многим (обратная) с таблицей users
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
