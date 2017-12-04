<?php

namespace App\Http\Controllers\Compras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Compras\Com_requisiciones;
use App\Models\Compras\Com_departamentos;
use App\Models\Compras\Com_config;
use App\Models\Compras\Com_requisicionDetalle;
use App\Models\Compras\Com_insumos;
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
        $ano = Com_config::año_activo();

        $requision = Com_requisiciones::where([
                                            ['status','Vigente'],
                                            ['ano', $ano->ano]
                                        ])->get();

        $requisicion = Com_requisicionDetalle::select('*')->where('ano',$ano->ano)->get();
        
        $insumos = Com_insumos::select('*')->whereRaw("YEAR(CAST(created_at as date)) = $ano->ano")->get();

        return view('compras.requisiciones.index',['requisicion'=> $requision,'insumos'=>$insumos,'requisiciones' => $requisicion]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ano = Com_config::año_activo();

        $requisicion = Com_requisiciones::where([
                                            ['status','Vigente'],
                                            ['ano', $ano->ano]
                                        ])->get();

        $departamentos = Com_departamentos::all();
        $año = Date("Y");

        $requisicion_codigo = $requisicion->last();
        if($requisicion_codigo == null){
            $codigo = 1;
        }else{

            $codigo = $requisicion_codigo->codigo + 1;
        }
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
        $requisicion = Com_requisiciones::findOrFail($id);

        return view('compras.requisiciones.ver',['requisicion' => $requisicion]);
        
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
        //dd($request->all());

        $requisicion = Com_requisiciones::findOrFail($id);
        $requisicion->fill($request->all());
        if($requisicion->update())
        {
            $with = [
            'flash_message' => 'Se modifico la requisicion correctamente!',
            'flash_class' => 'alert-success'];

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $requisicion = Com_requisiciones::findOrFail($id);

        $requisicion->status = 'Inactivo';

        if($requisicion->update())
        {
            $with = [
            'flash_message' => 'Se elimino la requisicion correctamente!',
            'flash_class' => 'alert-danger'];

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
}
