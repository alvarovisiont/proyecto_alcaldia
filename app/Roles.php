<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $table = "roles";

    public $primaryKey="id_rol";

    protected $fillable = ['id_rol', 'nombre', 'descripcion'];

    public function usuarios()
    {
    	return $this->hasMany('App\user','rol_id')->get();
    }
}
