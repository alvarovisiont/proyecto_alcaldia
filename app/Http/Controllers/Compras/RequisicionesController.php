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
        return view('compras.requisiciones.index')->with('requisicion', $requision);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $requisicion = Com_requisiciones::all();
        $departamentos = Com_departamentos::all();
        $año = Date("Y");
        $requisicion_codigo = $requisicion->last();
        $codigo = $requisicion_codigo->codigo + 1;
        //dd($codigo);
        return view('compras.requisiciones.create',['departamentos'=>$departamentos,'ano' => $año,'codigo' => $codigo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());


        $requisicion = new Com_requisiciones;
        $requision = Com_requisiciones::all();
        $requisicion->fill($request->all());
        $requisicion->descripcion = strtoupper($request->input('descripcion'));

            if($requisicion->save())
        {
            $with = [
            'flash_message' => 'Se registro la requisicion correctamente!',
            'flash_class' => 'alert-success',
            'requisicion' => $requisicion];

        }else{
            $with = [
            'flash_message' => 'Ha ocurrido un error.',
            'flash_class' => 'alert-danger',
            'alert-important' => true
            ];
        }
        //dd($with);
        return redirect('com_requisicion')->with($with);

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
        //$año = Date("Y");
        return view('compras.requisiciones.modificar')->with(['departamentos' => $departamentos , 'requisicion' => $requisicion]);
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
        dd($request->all());

        /*$requisicion = Com_requisiciones::findOrFail($id);
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
        return redirect('/com_requisicion');*/
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
