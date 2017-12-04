<?php

namespace App\Http\Controllers\Compras;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Compras\Com_departamentos;

use Session;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $departamentos = Com_departamentos::all();
        return view('compras.departamentos.index')->with('departamentos', $departamentos);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departamentos = new Com_departamentos;
        $ruta = 'com_departamentos';
        $datos = ['departamentos' => $departamentos, 'ruta' => $ruta, 'edit' => false];
        return view('compras.departamentos.create')->with($datos);
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
        Com_departamentos::create($request->all());
        Session::flash('flash_create', 'Departamento creado con éxito');
        return redirect('com_departamentos');
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
        $departamentos =  Com_departamentos::findOrFail($id);
        $ruta = 'com_departamentos/'.$id;
        $datos = ['departamentos' => $departamentos, 'ruta' => $ruta, 'edit' => true];
        return view('compras.departamentos.update')->with($datos);
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
        $departamentos = Com_departamentos::findOrFail($id);
        $departamentos->fill($request->all());
        $departamentos->update();
        Session::flash('flash_create', 'Departamento modificado con éxito');
        return redirect('/com_departamentos');
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
        Com_departamentos::where('id',$id)->delete();
    }
}
