<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;

class RolesController extends Controller
{
    public function index ()
    {
    	$roles = Roles::all();
    	return view('roles.index',['roles' => $roles]);
    }

    public function create()
    {
    	return view('roles.create');
    }

    public function registrar(Request $request)
    {
    	//dd($request->all());
    		$roles = new Roles;
    		$roles = $roles->fill($request->all());
    		if($roles->save())
        {
            $with = [
            'flash_message' => 'Se registro el rol correctamente!',
            'flash_class' => 'alert-success'];

        }else{
            $with = [
            'flash_message' => 'Ha ocurrido un error.',
            'flash_class' => 'alert-danger',
            'alert-important' => true
            ];
        }
        //dd($with);
        return redirect()->route('roles.index')->with($with);
    }

    public function update($id)
    {
    	$roles = Roles::findOrFail($id);

    	return view('roles.modificar',['rol' => $roles]);
    }

    public function editar(Request $request,$id)
    {

        
    	//dd($request->all());
    	$roles = Roles::findOrFail($id);
        $roles->fill($request->all());
        if($roles->save())
        {
            $with = [
            'flash_message' => 'Se modifico el rol correctamente!',
            'flash_class' => 'alert-success'];

        }else{
            $with = [
            'flash_message' => 'Ha ocurrido un error.',
            'flash_class' => 'alert-danger',
            'alert-important' => true
            ];
        }
        //dd($with);
        return redirect()->route('roles.index')->with($with);
    }

    public function show($id)
    {
    	$roles = Roles::findOrFail($id);
    	$usuarios = $roles->usuarios();
    	$user = (object)["user" => $usuarios , 'count' => $usuarios->count()];
    	//dd($usuarios);

    	return view('roles.ver',['rol' => $roles , 'usuarios' => $user]);
    }

    public function destroy($id)
    {
    	$roles = Roles::findOrFail($id);
    	$usuarios = $roles->usuarios()->count();
    	if($usuarios > 0)
    	{
    		$with = [
            'flash_message' => 'Este rol tiene usuarios asociados , no se puede eliminar!',
            'flash_class' => 'alert-danger'];
    	}else{

    		if($roles->destroy($id))
    		{
    			$with = [
	            'flash_message' => 'Se Elimino correctamente!',
	            'flash_class' => 'alert-danger'];
	        }else{
	        	$with = [
	            'flash_message' => 'Ocurrio un error inesperado!',
	            'flash_class' => 'alert-danger'];
	        }
    		
    	}
    	return redirect()->route('roles.index')->with($with);



    }
}
