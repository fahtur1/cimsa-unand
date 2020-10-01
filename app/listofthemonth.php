<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class listofthemonth extends Model
{
    //
    protected $table = 'listofthemonth';
    protected $fillable = [
        'id', 'title', 'month', 'year', 'author', 'content', 'image'
    ];
}
