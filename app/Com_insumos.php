<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Com_insumos extends Model
{
    protected $fillable = ['codigo'.'descripcion','cantidad','unidad','des_unidad'];
}
