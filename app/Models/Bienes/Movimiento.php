<?php

namespace App\Bienes;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
  	protected $table = "bienes_movimientos";

    protected $fillable = ['bien_id','fecha', 'unidad_id', 'unidad_detalles_id','observacion','foto','concepto_id'];

    public function bien(){
    	return $this->belongsTo('App\Bienes\Bien','bien_id');
    }

    public function concepto(){
    	return $this->belongsTo('App\Bienes\Concepto','concepto_id');
    }

    public function unidad(){
    	return $this->belongsTo('App\Bienes\Unidad','unidad_id');
    }

    public function unidad_detalles(){
    	return $this->belongsTo('App\Bienes\Unidad_detalles','unidad_detalles_id');
    }

    public function des_incorporacion($tipo = NULL){
    	if($tipo == 1){
    		return $this->concepto->tipo == 'Incorporación' ? number_format($this->bien->precio,2,',','.') : '';
    	}else{
    		return $this->concepto->tipo == 'Incorporación' ? '' : number_format($this->bien->precio,2,',','.');
    	}
    }
}
