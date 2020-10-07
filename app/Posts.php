<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Posts::class);
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function autor()
    {
        return $this->hasOne(Autores::class,'id');
    }
}
