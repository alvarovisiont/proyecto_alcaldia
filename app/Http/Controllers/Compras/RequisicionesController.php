<?php

namespace App\Http\Controllers\Compras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Com_requisiciones;
use App\Com_departamentos;
use App\Com_config;
use Session;

class RequisicionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $requision = Com_requisiciones::all();
        return view('compras.requisiciones.index')->with('requision', $requision);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $requisicion = new Com_requisiciones;
        $departamentos = Com_departamentos::all();
        $año = Com_config::select('ano')->first();
        $ruta = 'com_requisicion';
        $datos = ['año' => $año,'requisicion' => $requisicion, 'departamentos' => $departamentos, 'ruta' => $ruta, 'edit' => false];
        return view('compras.requisiciones.create')->with($datos);
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

        Com_requisiciones::create([
            'codigo' => $request->codigo,
            'descripcion' => $request->descripcion,
            'fecha' => date('Y-m-d', strtotime($request->fecha)),
            'status' => $request->status,
            'des_unidad' => $request->des_unidad,
            'unidad' => $request->unidad,
            'centro' => $request->centro,
            'ano' => $request->ano
            ]);

        Session::flash('flash_create', 'Requisición creada con éxito');
        return redirect('/com_requisicion');
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
        $requisicion =  Com_requisiciones::findOrFail($id);
        $departamentos = Com_departamentos::all();
        $año = Com_config::select('ano')->first();
        $ruta = 'com_requisicion/'.$id;
        $datos = ['departamentos' => $departamentos,'año' => $año, 'requisicion' => $requisicion, 'ruta' => $ruta, 'edit' => true];
        return view('compras.requisiciones.update')->with($datos);
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
        $requisicion = Com_requisiciones::findOrFail($id);
        $datos = [
            'codigo' => $request->codigo,
            'descripcion' => $request->descripcion,
            'fecha' => date('Y-m-d', strtotime($request->fecha)),
            'status' => $request->status,
            'des_unidad' => $request->des_unidad,
            'unidad' => $request->unidad,
            'centro' => $request->centro,
            'ano' => $request->ano
        ];
        $requisicion->fill($datos);
        $requisicion->update();
        Session::flash('flash_create', 'Requisición modificada con éxito');
        return redirect('/com_requisicion');
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
        Com_requisiciones::where('id',$id)->delete();
    }
}
