<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Com_insumos extends Model
{
	public $table = 'com_insumos';
    protected $fillable = ['codigo','descripcion','cantidad','id_unidad'];

    function unidades()
    {
    	return $this->hasOne('App\Com_unidades','id');
    }

    public function requisicion()
    {
        return $this->hasMany('App\Com_requisicionDetalle','com_insumo_id');
    }
}
