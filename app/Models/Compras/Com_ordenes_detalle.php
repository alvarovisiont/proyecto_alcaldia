<?php

namespace App\Models\Compras;

use Illuminate\Database\Eloquent\Model;

class Com_ordenes_detalle extends Model
{
    //
    protected $fillable = ['com_ordenes_id','item_insumo','descripcion','cantidad','unidad','base','sub_total','iva','iva_porcentaje','total','ano'];
    
    public function ordenes()
    {
    	return $this->belongsTo('App\Models\Compras\Com_ordenes','com_ordenes_id');
    }
}
