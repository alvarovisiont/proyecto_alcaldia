<?php

namespace App\Models\Compras;

use Illuminate\Database\Eloquent\Model;

class Com_insumos extends Model
{
	public $table = 'com_insumos';
    protected $fillable = ['codigo','descripcion','cantidad','bienes','id_unidad'];

    function unidades()
    {
    	return $this->hasOne('App\Models\Compras\Com_unidades','id');
    }

    public function requisicion_detalle()
    {
        return $this->hasMany('App\Models\Compras\Com_requisicionDetalle','com_insumo_id');
    }
}
