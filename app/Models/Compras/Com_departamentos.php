<?php

namespace App\Models\Compras;

use Illuminate\Database\Eloquent\Model;

class Com_departamentos extends Model
{
    //

    protected $fillable = ['programatica','unidad_departamento', 'descripcion'];

    public function requisicion()
    {
        return $this->hasMany('App\Models\Compras\Com_requisiciones','departamento_id');
    }
}
