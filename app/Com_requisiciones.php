<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Com_requisiciones extends Model
{
    //

    protected $fillable = ['codigo', 'descripcion', 'fecha', 'status', 'des_unidad', 'departamento_id', 'centro', 'ano'];

    public function departamento()
    {
        return $this->belongsTo('App\Com_departamentos','departamento_id');
    }

    public function req_detalle(){

    	return $this->hasMAny('App\Com_requisicion_Detalle');
    }

    
     public  function fechaBetween($desde,$hasta)
    {
        return $this->whereBetween('fecha',[$desde,$hasta])->get();
    }
}
