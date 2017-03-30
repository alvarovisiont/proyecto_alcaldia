<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = "area";
    
    protected $primaryKey = "id_area";

    protected $fillable = ['departamento_id', 'nombre'];

    public function areas_por_departamentos($depar)
    {
    	return $this->select('id_area', 'nombre')->where('departamento_id', '=', $depar)->get();
    }

    public function departamentos(){
    	return $this->belongsTo('App\Departamentos','departamento_id');
    }

    public function subAreas(){
    	return $this->hasMany('App\Sub_area','id_sub_area')->get();
    }
}
