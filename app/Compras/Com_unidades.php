<?php

namespace App\Compras;

use Illuminate\Database\Eloquent\Model;

class Com_unidades extends Model
{
    //
    protected $fillable = ['codigo', 'descripcion'];

    public function insumos()
    {
    	return $this->belongsTo('App\Compras\com_insumos');
    }
}
