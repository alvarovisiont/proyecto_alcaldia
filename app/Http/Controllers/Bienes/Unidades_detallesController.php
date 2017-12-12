<?php

namespace App\Http\Controllers\Bienes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bienes\Unidad_detalles;

class Unidades_detallesController extends Controller
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
            'descripcion' => 'required',
            'ubicacion' => 'required',
            'actividad' => 'required'
        ]);

        $unidad = $request->unidad_id;

        $detalle = new Unidad_detalles;

        $detalle->fill($request->all());
        $detalle->seccion = $detalle->last_seccion($unidad);

        if($detalle->save()){
            return redirect('bienes_unidades/'.$unidad)->with([
            'flash_message' => 'Detalle agregado correctamente',
            'flash_class' => 'alert-success']);
        }else{
            return redirect('bienes_unidades/'.$unidad)->with([
            'flash_message' => 'Ha ocurrido un error.',
            'flash_class' => 'alert-danger',
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
        $detalle = Unidad_detalles::findOrFail($id);

        return response()->json($detalle);
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
        $detalle = Unidad_detalles::findOrFail($id);

        $this->validate($request,[
            'descripcion' => 'required',
            'ubicacion' => 'required',
            'actividad' => 'required'
        ]);

        $unidad = $detalle->unidad_id;

        $detalle->fill($request->all());

        if($detalle->save()){
            return redirect('bienes_unidades/'.$unidad)->with([
            'flash_message' => 'Detalle modificado correctamente.',
            'flash_class' => 'alert-success']);
        }else{
            return redirect('bienes_unidades/'.$unidad)->with([
            'flash_message' => 'Ha ocurrido un error.',
            'flash_class' => 'alert-danger',
            'alert-important' => true
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalles = Unidad_detalles::findOrFail($id);
        $unidad = $detalles->unidad_id;
        $bienes = $detalles->bienes()->get();

        if(count($bienes)==0){
		        if($detalles->delete()){
		            return redirect("bienes_unidades/".$unidad)->with([
		                'flash_message' => 'Detalle eliminado correctamente.',
		                'flash_class' => 'alert-success'
		            ]);
		        }else{
		            return redirect("bienes_unidades/".$unidad)->with([
		                'flash_message' => 'Ha ocurrido un error.',
		                'flash_class' => 'alert-danger',
		                'flash_important' => true
		            ]);
		        }
		    }else{
            return redirect("bienes_unidades/".$unidad)->with([
                'flash_message' => 'Este detalle tienes bienes asociados.',
                'flash_class' => 'alert-danger',
                'flash_important' => true
            ]);
		    }
    }
}
