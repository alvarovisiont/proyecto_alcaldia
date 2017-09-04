<?php

namespace App\Compras;

use Illuminate\Database\Eloquent\Model;

class Com_config extends Model
{
    //
    protected $fillable = ['ano', 'presidente', 'coordinador', 'correlativo'];

    
    public static function año_activo()
	{	
		return self::select('ano')->first();
	}
}


