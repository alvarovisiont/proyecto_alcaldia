<?php

namespace App\Http\Controllers\Bienes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bienes\Movimiento;
use App\Bienes\Bien;

class MovimientosController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        	'fecha' => 'required',
        	'unidad_id' => 'required',
        	'unidad_detalles_id' => 'required',
        	'concepto_id' => 'required'
        	]);

        $movimiento = new Movimiento;

        $movimiento->fill($request->all());

        $movimiento->fecha = date("Y-m-d",strtotime($request->fecha));

        if($movimiento->save()){

        		$status = $request->concepto_id == 60 ? 'DESINCORPORADO':0;
        		$bien = Bien::find($request->bien_id);
        		$bien->unidad1     = $request->unidad_id;
        		$bien->seccion1    = $request->unidad_detalles_id;
        		$bien->concepto_id = $request->concepto_id;
        		$bien->status      = $status;

        		$bien->save();

            return redirect('/bienes_bienes/'.$request->bien_id)->with([
            'flash_message' => 'Movimiento agregado correctamente.',
            'flash_class'   => 'alert-success']);
        }else{
            return redirect('/bienes_bienes/'.$request->bien_id)->with([
            'flash_message'   => 'Ha ocurrido un error.',
            'flash_class'     => 'alert-danger',
            'alert-important' => true
            ]);        	
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
