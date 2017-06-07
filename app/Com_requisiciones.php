<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Com_requisiciones extends Model
{
    //
    protected $fillable = ['codigo', 'descripcion', 'fecha', 'status', 'des_unidad', 'unidad', 'centro', 'ano'];
}
