<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BancoReceptor extends Model
{
    protected $table = 'banco_receptor';

    protected $fillable = [
		'titular', 'banco_id', 'cedula', 'cuenta', 'nro_cuenta', 'telefono', 'correo',
    ];
    
    protected $hidden = [
         'remember_token',
    ];

     public function banco()
    {
     return $this->belongsTo(Banco::class, 'banco_id');
    }
}
