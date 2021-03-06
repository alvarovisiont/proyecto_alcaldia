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

class UsuariosController extends Controller
{
		//Mostrar el perfil del usuario en sesion
		public function perfil()
    {
			$perfil = User::findOrFail(Auth::user()->id);
			
    	return view('usuarios.perfil', ['perfil' => $perfil]);
		}

		//Actualizar perfil del usuario en sesion
		public function update_perfil(Request $request)
    {
  
      $user = User::find(Auth::user()->id);

      $user = $user->fill($request->all());

      if($request->input('checkbox') == "Yes"){
    		$pass = bcrypt($request->input('password_new'));
    		$perfil->password = $pass;
	    }

      if($user->update()){
        return redirect()->route('perfil')->with([
          'flash_message' => 'Cambios guardados correctamente.',
          'flash_class' => 'alert-success'
        ]);
    	}else{
        return redirect()->route('perfil')->with([
    				'flash_important' => true,
            'flash_message' => 'Ha ocurido u error.',
            'flash_class' => 'alert-danger'
        ]);
    	}
		}



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

        $validar_accion = false;
        $url = 'usuario';

        $datos = ['url' => $url, 'usuario' => $usuario, 'roles' => $roles, 'departamentos' => $departamentos, 'areas' => $areas, 'sub_areas' => $sub_areas, 'acceso' => $acceso, 'validar_accion' => $validar_accion, 'edit' => false];

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

        $validate = array_key_exists('departamentos_grabar', $request->all());

        if($validate)
        {
            $depars = explode(',', $request->departamentos_grabar);

            foreach ($depars as  $row) 
            {
              if($row != '')
              {
                $area = "";
                  $sub_area = "";

                  $acceso = new Acceso;

                  $acceso->user_id = $usuario->id;
                  if(array_key_exists('area_'.$row, $request->all()))
                  {
                    $area = implode($request->input('area_'.$row), ',');
                    
                    foreach ($request->input('area_'.$row) as $val) 
                    {
                        if(array_key_exists('sub_area_'.$val, $request->all()))
                        {

                          $sub_area .= implode($request->input('sub_area_'.$val), ',').",";
                        }
                    }
                  }

                  $sub_area = substr($sub_area, 0, strlen($sub_area) -1);
                  $acceso->departamento_id = $row;
                  $acceso->area_id = $area;
                  $acceso->sub_area_id = $sub_area;
                  $acceso->save();
              }
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
        $acceso = Acceso::where('user_id', '=', $id)->get();

        $validar_accion = false;

        if(count($acceso) > 0)
        {
            $validar_accion = true;            
        }
        
        $areas = new Area;
        $sub_areas = new Sub_area;
        $url = 'usuario/'.$usuario->id;

        $datos = ['url' => $url,'usuario' => $usuario, 'departamentos' => $departamentos, 'roles' => $roles, 'acceso' => $acceso, 'areas' => $areas, 'sub_areas' => $sub_areas, 'validar_accion' => $validar_accion, 'edit' => true, 'depars' => ''];

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

        $usuario->nac = $request->nac;
        $usuario->password = $request->password;
        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->cedula = $request->cedula;
        $usuario->usuario = $request->usuario;
        $usuario->telefono = $request->telefono;
        $usuario->rol_id = $request->rol_id;
        $usuario->departamento_id = $request->departamento_id;

        $usuario->save();

        Acceso::where('user_id',$usuario->id)->delete();

        $validate = array_key_exists('departamentos_grabar', $request->all());



        if($validate)
        {
            $depars = explode(',', $request->departamentos_grabar);

            foreach ($depars as  $row) 
            {
              if($row != '')
              {
                $area = "";
                  $sub_area = "";

                  $acceso = new Acceso;

                  $acceso->user_id = $usuario->id;
                  if(array_key_exists('area_'.$row, $request->all()))
                  {
                    $area = implode($request->input('area_'.$row), ',');
                    
                    foreach ($request->input('area_'.$row) as $val) 
                    {
                        if(array_key_exists('sub_area_'.$val, $request->all()))
                        {

                          $sub_area .= implode($request->input('sub_area_'.$val), ',').",";
                        }
                    }
                  }

                  $sub_area = substr($sub_area, 0, strlen($sub_area) -1);
                  $acceso->departamento_id = $row;
                  $acceso->area_id = $area;
                  $acceso->sub_area_id = $sub_area;
                  $acceso->save();
              }
            }
        }        
        
        $request->session()->forget('menu');

        session(['menu' => Acceso::menu()]);

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
        Acceso::where('user_id',$id)->delete();
    }

}
