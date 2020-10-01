<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class activities extends Model
{
    //
    protected $table = 'activities';
    protected $fillable = [
        'id', 'title', 'author', 'content', 'image'
    ];
}
