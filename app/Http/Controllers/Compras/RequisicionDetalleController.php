<?php

namespace App\Http\Controllers\Compras;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Com_insumos;
use App\Com_requisicionDetalle;
use App\Com_requisiciones;

class RequisicionDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $requisicion = Com_requisicionDetalle::all();
        $insumos= Com_insumos::all();
        $requi = Com_requisiciones::all();
        $año = Date("Y");
        $requisicion_codigo = $requisicion->last();
        	if($requisicion_codigo == null){
        		$codigo1 = 1;
        	}else{

        $codigo1 = $requisicion_codigo->codigo + 1;
    }
        //dd($codigo);
        return view('compras.requisiciones_detalles.create',['insumos'=>$insumos,'ano' => $año,'codigo' => $codigo1,'requisiciones' => $requisicion,'req' => $requi]);
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
        $this->validate($request, [
            'cantidad' => 'numeric|required',
            ]);
        $requisicion = new Com_requisicionDetalle;
        $requisicion->fill($request->all());
        if($requisicion->save())
        {
            $with = [
            'flash_message' => 'Se registro el detalle correctamente!',
            'flash_class' => 'alert-success'];

        }else{
            $with = [
            'flash_message' => 'Ha ocurrido un error.',
            'flash_class' => 'alert-danger',
            'alert-important' => true
            ];
        }
        //dd($with);
        return redirect('req_detalle/create')->with($with);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $requisicion = Com_requisicionDetalle::findOrFail($id);
        return view('compras.requisiciones_detalles.ver',['requisicion' => $requisicion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requisicion = Com_requisicionDetalle::findOrFail($id);
        $insumos= Com_insumos::all();
      
        //dd($codigo);
        return view('compras.requisiciones_detalles.modificar',['insumos'=>$insumos,'req' => $requisicion]);
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
        $requisicion = Com_requisicionDetalle::findOrFail($id);
        $requisicion->fill($request->all());
        if($requisicion->update())
        {
            $with = [
            'flash_message' => 'Se modifico el detalle correctamente!',
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
       $requisicion =  Com_requisicionDetalle::findOrFail($id);
       if($requisicion->delete())
        {
            $with = [
            'flash_message' => 'Se elimino el DETALLE correctamente!',
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
}
