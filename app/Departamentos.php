<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    //
    protected $table = "departamentos";

    protected $fillable = ['nombre', 'descripcion','fa_class'];

    protected $primaryKey = "id_departamento";

    public function areas(){
    	return $this->hasMany('App\Area','id_area')->get();
    }

    public function users(){
    	return $this->hasMany('App\User','departamento_id')->get()->count();
    }
}
