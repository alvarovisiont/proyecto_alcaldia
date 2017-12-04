<?php

namespace App\Models\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class Cont_auxiliares extends Model
{
    //
    protected $fillable = ['auxiliar','descripcion','cont__master_accounts_id','cont_configs_id'];

    public function cuentas()
    {
    	return $this->belongsTo('App\Models\Contabilidad\Cont_MasterAccount','cont__master_accounts_id');
    }
}
