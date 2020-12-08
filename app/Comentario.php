<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
     protected $table = 'comentarios';

     protected $fillable = [
        'user_id', 'contenido', 'carrera_id',
    ];
   public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
