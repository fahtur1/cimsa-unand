<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alumni extends Model
{
    //
    protected $table = 'alumni';
    protected $fillable = [
        'nama', 'sco', 'batch', 'image'
    ];

    public function alumniotm()
    {
        return $this->hasMany(alumniofthemonth::class);
    }
}
