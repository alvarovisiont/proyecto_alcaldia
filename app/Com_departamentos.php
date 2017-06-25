<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Com_departamentos extends Model
{
    //

    protected $fillable = ['programatica','unidad_departamento', 'descripcion'];

    public function requisicion()
    {
        return $this->hasMany('App\Com_requisiciones','departamento_id');
    }
}
