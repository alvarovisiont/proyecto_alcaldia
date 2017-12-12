<?php

namespace App\bienes;

use Illuminate\Database\Eloquent\Model;

class Tipo_bien extends Model
{
  	protected $table = "bienes_tipo_bien";

    protected $fillable = ['nomenclatura_id','codigo', 'descripcion'];

    public function generate_code(){
    	return str_pad(($this->max('codigo'))+1,5,"0",STR_PAD_LEFT);
    }

    public function nomenclatura(){
    	return $this->belongsTo('App\Bienes\Nomenclatura','nomenclatura_id');
    }

    public function bienes(){
    	return $this->hasMany('App\Bienes\Bien','tipo_bien_id');
    }
}
