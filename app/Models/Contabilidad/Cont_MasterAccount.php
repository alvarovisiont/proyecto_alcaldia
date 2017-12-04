<?php

namespace App\Models\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class Cont_MasterAccount extends Model
{
    //
    protected $fillable = ['cuenta','descripcion','operativa','detalle','p21','ano','cont_configs_id'];
}
