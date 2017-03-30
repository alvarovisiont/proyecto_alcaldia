<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Departamentos;
use App\Roles;
use App\Area;
use App\Sub_area;
use App\Acceso;

use Session;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();

        return view('usuarios.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $usuario = new User;
        $roles = Roles::select('id_rol', 'nombre')->get();
        $departamentos = Departamentos::select('nombre', 'id_departamento')->get();
        
        $areas = new Area;
        $sub_areas = new Sub_area;
        $acceso = new Acceso;

        
        $datos = ['usuario' => $usuario, 'roles' => $roles, 'departamentos' => $departamentos, 'areas' => $areas, 'sub_areas' => $sub_areas, 'acceso' => $acceso];

        return view('usuarios.create')->with($datos);
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
        $usuario->save();

        $validate = array_key_exists('depar', $request->all());

        if($validate)
        {
            foreach ($request->depar as  $row) 
            {

                $acceso = new Acceso;

                $acceso->user_id = $usuario->id;
                $area = implode($request->input('area_'.$row), ',');
                $sub_area = "";
                foreach ($request->input('area_'.$row) as $val) 
                {
                    $sub_area .= implode($request->input('sub_area_'.$val), ',').",";
                }

                $sub_area = substr($sub_area, 0, strlen($sub_area) -1);
                $acceso->departamento_id = $row;
                $acceso->area_id = $area;
                $acceso->sub_area_id = $sub_area;
                $acceso->save();
            }
        }        

        Session::flash('flash_create', 'Usuario creado con éxito');

        return redirect()->route('usuario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $areas = Area::where('departamento_id', '=', $id)->select('id_area', 'nombre')->get();

        if($request->ajax())
        {
            return response()->json($areas);
        }

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
        $usuario = User::findOrFail($id);

        $roles = Roles::select('id_rol', 'nombre')->get();
        $departamentos = Departamentos::select('nombre', 'id_departamento')->get();
        $acceso = Acceso::where('user_id', '=', $id)->first();
        
        $areas = new Area;
        $sub_areas = new Sub_area;

        $datos = ['usuario' => $usuario, 'departamentos' => $departamentos, 'roles' => $roles, 'acceso' => $acceso, 'areas' => $areas, 'sub_areas' => $sub_areas];

        return view('usuarios.edit')->with($datos);
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
        $usuario = User::findOrFail($id);
        $usuario->fill($request->all());
        $usuario->save();
        Session::flash('flash_create', 'Usuario Modificado con éxito');
        return redirect()->route('usuario.index');
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
        User::destroy($id);
    }
}
