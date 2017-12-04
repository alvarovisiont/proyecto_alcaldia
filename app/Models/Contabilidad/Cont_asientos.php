<?php

namespace App\Models\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class Cont_asientos extends Model
{
    //
    protected $fillable = ['comprobante','descripcion','fecha','cont_configs_id','status'];
}
