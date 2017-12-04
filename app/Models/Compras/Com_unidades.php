<?php

namespace App\Models\Compras;

use Illuminate\Database\Eloquent\Model;

class Com_unidades extends Model
{
    //
    protected $fillable = ['codigo', 'descripcion'];

    public function insumos()
    {
    	return $this->belongsTo('App\Models\Compras\com_insumos');
    }
}
