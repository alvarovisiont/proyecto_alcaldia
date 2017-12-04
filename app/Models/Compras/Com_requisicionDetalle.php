<?php

namespace App\Models\Compras;

use Illuminate\Database\Eloquent\Model;

class Com_requisicionDetalle extends Model
{
    protected $table = 'com_requisicion_detalles';

    protected $fillable = [
    'codigo',
    'cantidad',
    'com_insumo_id',
    'ano',
    'com_req_id'];

    public function insumos()
    {
    	return $this->belongsTo('App\Models\Compras\Com_insumos','com_insumo_id');
    }

    public function requisicion(){

        return $this->belongsTo('App\Models\Compras\Com_requisiciones','com_req_id');
    }
}
