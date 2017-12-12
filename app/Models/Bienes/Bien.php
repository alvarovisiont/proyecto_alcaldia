<?php

namespace App\Bienes;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
  	protected $table = "bienes_bienes";

    protected $fillable = [
		            'codigo',
		            'unidad_id',
		            'unidad_detalles_id',
		            'tipo_bien_id',
		            'descripcion',
		            'fecha',
		            'descripcion_general',
		            'id_orden_compra',
		            'id_insumo',
		            'foto',
		            'unidad1',
		            'seccion1',
		            'precio',
		            'status',
		            'concepto_id',
		            'direccion',
		            'categoria',
		            'qr_code'
		          ];

    public function generateCodigo(){
    	return str_pad(($this->max('codigo'))+1,5,"0",STR_PAD_LEFT);
    }

    public function unidad(){
    	return $this->belongsTo('App\Bienes\Unidad','unidad_id');
    }

    public function seccion(){
    	return $this->belongsTo('App\Bienes\Unidad_detalles','unidad_detalles_id');
    }

    public function tipo(){
    	return $this->belongsTo('App\Bienes\tipo_bien','tipo_bien_id');
    }

    public function movimientos(){
    	return $this->hasMany('App\Bienes\Movimiento','bien_id');
    }

    public function concepto(){
    	return $this->belongsTo('App\Bienes\Concepto','concepto_id');
    }

    public function qr_redirect($codigo){
    	$ip = getHostByName(getHostName());
    	return  str_replace('localhost',$ip,Route('bienes_bienes.index').'/bien/'.$codigo);
    }

    public static function fecha_minima(){
    	return Bien::min('fecha');
    }

    public static function anios(){
    	return Bien::selectRaw("DISTINCT EXTRACT(year from fecha) as anio")->get();
    }
}
