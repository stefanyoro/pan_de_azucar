<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Corredor extends Model
{
    protected $table = 'corredor';

    public function user()
    {
     return $this->belongsTo(User::class, 'user_id');
    }
}
