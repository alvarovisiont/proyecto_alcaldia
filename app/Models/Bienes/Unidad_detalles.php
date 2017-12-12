<?php

namespace App\bienes;

use Illuminate\Database\Eloquent\Model;

class Unidad_detalles extends Model
{
  	protected $table = "bienes_unidades_detalles";

    protected $fillable = ['unidad_id','descripcion', 'actividad', 'ubicacion','seccion'];

    public function unidad()
    {
    	return $this->belongsTo('App\Bienes\Unidad','unidad_id');
    }

    public function last_seccion($unidad){
    	return ($this->where('unidad_id',$unidad)->max('seccion'))+1;
    }

    public function bienes(){
    	return $this->hasMany('App\Bienes\Bien','unidad_detalles_id');
    }

    public function movimientos_concepto($desde,$hasta,$operador,$concepto){
    }

    public function detalles(){
				$system->sql = "SELECT detalle.descripcion,detalle.seccion, 
													(SELECT SUM(movi.precio) as precio from bienes.b_movimientos as movi
															where (movi.unidad = detalle.unidad and movi.seccion = detalle.seccion)
															and (CAST(movi.fecha as date) BETWEEN '$desde' and '$hasta' ) and concepto < 19 ) 
															-
															(SELECT CASE WHEN SUM(movi.precio) > 0 THEN SUM(movi.precio) ELSE 0 END as precio 
															from bienes.b_movimientos as movi
															where (movi.unidad = detalle.unidad and movi.seccion = detalle.seccion)
															and (CAST(movi.fecha as date) BETWEEN '$desde' and '$hasta') and concepto > 18 ) 
															as precio
															
													from bienes.b_unidad_detalle as detalle 
													where detalle.unidad = $row->unidad";
    }

    public function sumaMovimientosConcepto($desde,$hasta,$operador,$concepto){
    		return $this->hasMany('App\Bienes\Movimiento','unidad_detalles_id')
    							->join('bienes_bienes','bienes_bienes.id','=','bienes_movimientos.id')
    							->join('bienes_conceptos','bienes_movimientos.concepto_id','=','bienes_conceptos.id')
    							->where('bienes_conceptos.codigo',$operador,$concepto)
    	            ->whereBetween('bienes_movimientos.fecha',[$desde,$hasta])
    	            ->get()
    	            ->sum('precio');
    }

    public function reporteUnidadesDetalles($desde,$hasta){
    	$menor19 = $this->sumaMovimientosConcepto($desde,$hasta,'<',19);
    	$mayor18 = $this->sumaMovimientosConcepto($desde,$hasta,'>',18);
    	return $menor19 - ($mayor18>0?$mayor18:0);
    }
}
