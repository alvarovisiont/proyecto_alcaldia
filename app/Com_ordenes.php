<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Com_ordenes extends Model
{
    //
    protected $fillable = ['codigo','numero_control','lugar_entrega','forma_pago','condicion_compra','plazo_entrega','tipo_orden','fecha_orden','com_requisiciones_codigo','fecha_requisicion','com_requisicion_concepto','com_departamento_programatica','com_departamento_unidad','com_provees_rif','com_provees_razon_social','com_provees_direccion'];

    public function detalle_orden()
    {
    	return $this->hasMany('App\Com_ordenes_detalle');
    }
}
