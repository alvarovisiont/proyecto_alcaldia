<?php

namespace App\Bienes;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    public static function bienes_bm1($unidad_detalle,$desde,$hasta){
    	return Bien::where('unidad_detalles_id',$unidad_detalle)->whereBetween('fecha', [$desde, $hasta])->get();
    }

   	public static function bienes_bm2($unidad_detalle,$desde,$hasta){
			return Movimiento::join('bienes_bienes','bienes_bienes.id','=','bien_id')
										->where('bienes_movimientos.unidad_detalles_id',$unidad_detalle)
										->whereBetween('bienes_movimientos.fecha',[$desde,$hasta])
										->orderBy('bien_id','asc')
										->orderBy('bienes_movimientos.fecha','asc')
										->get();
   	}

   	public static function exis_anterior($unidad_detalle,$desde){
			return Movimiento::join('bienes_conceptos','bienes_conceptos.id','=','concepto_id')
												->join('bienes_bienes','bienes_bienes.id','=','bien_id')
												->where([['bienes_movimientos.fecha','<',$desde],
																['bienes_conceptos.codigo','<=',19],
																['bienes_movimientos.unidad_detalles_id',$unidad_detalle]
															])
												->sum('precio');
   	}

   	public static function incorporacion($unidad_detalle,$desde,$hasta){
			return Movimiento::join('bienes_bienes','bienes_bienes.id','=','bien_id')
												->where([['bienes_movimientos.fecha','>=',$desde],
																['bienes_movimientos.fecha','<=',$hasta],
																['bienes_movimientos.unidad_detalles_id',$unidad_detalle]
															])
												->sum('precio');
   	}

   	public static function desincorporacionMenos60($unidad_detalle,$desde,$hasta){
			return Movimiento::join('bienes_conceptos','bienes_conceptos.id','=','concepto_id')
												->join('bienes_bienes','bienes_bienes.id','=','bien_id')
												->where([['bienes_movimientos.fecha','>=',$desde],
																['bienes_movimientos.fecha','<=',$hasta],
																['bienes_conceptos.codigo','>',19],
																['bienes_conceptos.codigo','<>',60],
																['bienes_movimientos.unidad_detalles_id',$unidad_detalle]
															])
												->sum('precio');

   	}

   	public static function desincorporacion60($unidad_detalle,$desde,$hasta){
			return Movimiento::join('bienes_conceptos','bienes_conceptos.id','=','concepto_id')
												->join('bienes_bienes','bienes_bienes.id','=','bien_id')
												->where([['bienes_movimientos.fecha','>=',$desde],
																['bienes_movimientos.fecha','<=',$hasta],
																['bienes_conceptos.codigo',60],
																['bienes_movimientos.unidad_detalles_id',$unidad_detalle]
															])
												->sum('precio');
   	}

   public static function des_incorporaciones($concepto,$desde,$hasta){
			return Movimiento::join('bienes_conceptos','bienes_conceptos.id','=','concepto_id')
												->join('bienes_bienes','bienes_bienes.id','=','bien_id')
												->where('bienes_movimientos.concepto_id',$concepto)
												->whereBetween('bienes_movimientos.fecha',[$desde,$hasta])
												->orderBy('bienes_movimientos.unidad_id','asc')
												->orderBy('bienes_movimientos.fecha','asc')
												->get();
   }

   public static function unidades($unidad = false){
   		return Unidad::when($unidad, function ($query) use ($unidad) {
				                  return $query->where('id',$unidad);
			              })
   									->orderBy('identificacion','asc')
 										->get();
   }
}
