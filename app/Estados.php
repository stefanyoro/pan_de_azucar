<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
   	  protected $table = 'estados';

   	  public function ciudades()
	{
		 return $this->hasMany('ciudades');
	}

}
