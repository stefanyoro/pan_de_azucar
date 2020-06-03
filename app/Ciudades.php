<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
   	  protected $table = 'ciudades';

   	  public function estados()
		{
			 return $this->belongsTo('estados');
		}
}