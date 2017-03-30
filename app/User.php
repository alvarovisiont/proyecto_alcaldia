<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres', 'apellidos','nac','cedula', 'telefono', 'usuario', 'password', 'rol_id', 'departamento_id',
        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function traer_usuarios()
    {
        return Usuarios::all();
    }

    public function departamentos()
    {
        return $this->join('departamentos', 'users.departamento_id', '=', 'departamentos.id_departamento')
                    ->select('departamentos.nombre', 'departamentos.id_departamento')
                    ->where('users.id', '=', Auth::user()->id)
                    ->get();
    }


}