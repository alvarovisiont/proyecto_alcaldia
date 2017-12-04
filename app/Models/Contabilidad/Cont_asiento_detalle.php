<?php

namespace App\Models\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class Cont_asiento_detalle extends Model
{
    //
    protected $fillable = ['cont_asientos_id','cont__master_accounts_id','cont_auxiliares_id','referencia','debe','haber','cont_configs_id'];

    public function cuentas()
    {
    	return $this->belongsTo('App\Models\Contabilidad\Cont_MasterAccount','cont__master_accounts_id');
    }

    public function aux()
    {
    	return $this->belongsTo('App\Models\Contabilidad\Cont_auxiliares','cont_auxiliares_id');
    }
}
