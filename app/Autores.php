<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autores extends Model
{
    protected $table = 'autores';

    public function posts()
    {
        return $this->hasMany(Posts::class);
    }
}
