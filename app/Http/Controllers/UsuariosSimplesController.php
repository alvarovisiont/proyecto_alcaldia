<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\Departamentos;
use App\Roles;
use App\Area;
use App\Sub_area;
use App\Acceso;

use Session;

class UsuariosSimplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $departamento = Auth::user()->departamentos->nombre;
        $usuarios = User::all()->where('departamento_id',Auth::user()->departamento_id);

        return view('usuarios.index_simple',['departamento'=>$departamento,'usuarios'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = new User;
        $departamento = Auth::user()->departamentos->nombre;
        $roles = Roles::all();

        return view('usuarios.create_simple',['usuario'=>$user,'departamento'=>$departamento,'url'=>'usuarios_simples.store','roles'=>$roles,'edit'=>false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $usuario = new User;
        $usuario->fill($request->all());
        $usuario->password = bcrypt($request->password);
        $usuario->departamento_id = Auth::user()->departamento_id;

        if($usuario->save()){
          
          return redirect()->route('usuarios_simples.index')->with(['flash_message'=>'Usuario creado con exito.','flash_class'=>'alert-success']);
        }else{
          
          return redirect('usuarios.index_simple')->with(['flash_message'=>'Ha ocurrido un error.','flash_class'=>'alert-danger']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
          $user = User::findOrFail($id);
          $departamento = Auth::user()->departamentos->nombre;
          $roles = Roles::all();

          return view('usuarios.edit_simple',['usuario'=>$user,'departamento'=>$departamento,'url'=>'usuarios_simples' ,'roles'=>$roles,'edit'=>true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
