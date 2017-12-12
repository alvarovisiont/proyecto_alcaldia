<?php

namespace App\bienes;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
  	protected $table = "bienes_unidades";

    protected $fillable = ['identificacion', 'actividad', 'ubicacion'];

    public $totalReporte = 0;

    public function detalles(){
    	return $this->hasMany('App\Bienes\Unidad_detalles','unidad_id')->get();
    }

    public function bienes(){
    	return $this->hasMany('App\Bienes\Bien','unidad_id');
    }
}
