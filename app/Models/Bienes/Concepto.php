<?php

namespace App\Bienes;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
  	protected $table = "bienes_conceptos";

    protected $fillable = ['descripcion', 'tipo', 'status','codigo'];

    public function generate_code(){
    	return str_pad(($this->max('codigo'))+1,5,"0",STR_PAD_LEFT);
    }

    public function bienes(){
    	return $this->hasMany('App\Bienes\Bien','concepto_id');
    }

    public static function conceptos($tipo = NULL){
    	if($tipo == 1){
    		return Concepto::where('tipo','Incorporación')->get();
    	}else{
    		return Concepto::where('tipo','Desincorporación')->get();
    	}
    }
}
