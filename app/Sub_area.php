<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_area extends Model
{
    //
    protected $table = "sub_area";

	public $primaryKey="id_sub_area";
	
    protected $fillable = ['area_id', 'nombre', 'descripcion', 'ruta'];

    public function sub_areas_por_areas($area)
    {
    	return $this->select('id_sub_area', 'nombre')->where('area_id', '=', $area)->get();
    }

    public function areas()
    {
    	return $this->belongsTo('App\Area','area_id');
    }
}
