<?php

namespace App\Models\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class Cont_config extends Model
{
    //

	protected $fillable = ['ano', 'alcalde', 'coordinador', 'status'];

    public static function statusOffOn($id)
    {
    	self::where('id','!=',$id)
    		  ->update(['status' => 0]);

    	self::where('id','=',$id)
    		  ->update(['status' => 1]);
    }

    public static function configActivate()
    {
    	return self::where('status',1)->select('id')->first();
    }
}
