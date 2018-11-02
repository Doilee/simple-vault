<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Entry
 * @package App
 */
class Entry extends Model
{
    /**
     * @var array
     */
    protected $guarded = [
        'url', 'username', 'password', 'author_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
