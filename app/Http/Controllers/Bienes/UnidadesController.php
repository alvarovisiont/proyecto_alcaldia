<?php

namespace App\Http\Controllers\Bienes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bienes\Unidad;
use App\Bienes\Unidad_detalles;

class UnidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades = Unidad::all();
        return view("bienes.unidades.index",['unidades'=>$unidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('bienes.unidades.create');
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
            'identificacion' => 'required',
            'actividad' => 'required',
            'ubicacion' => 'required'
        ]);

        $unidad = new Unidad;

        $unidad->fill($request->all());

        if($unidad->save()){
            return redirect('bienes_unidades')->with([
            'flash_message' => 'Unidad agregada correctamente',
            'flash_class' => 'alert-success']);
        }else{
            return redirect('bienes_unidades')->with([
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
        $unidad   = Unidad::findOrFail($id);
        $detalles = $unidad->detalles();

        return view('bienes.unidades.view',['unidad'=>$unidad,'detalles'=>$detalles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unidad = Unidad::findOrFail($id);

        return view('bienes.unidades.edit',['unidad'=>$unidad]);
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
        $unidad = Unidad::findOrFail($id);

        $this->validate($request,[
            'identificacion' => 'required',
            'actividad' => 'required',
            'ubicacion' => 'required'
        ]);

        $unidad->fill($request->all());

        if($unidad->save()){
            return redirect('bienes_unidades')->with([
            'flash_message' => 'Unidad modificada correctamente',
            'flash_class' => 'alert-success']);
        }else{
            return redirect('bienes_unidades')->with([
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
        $unidad = Unidad::findOrFail($id);

        $bienes = $unidad->bienes()->get();

        if(count($bienes)==0){
		        if($unidad->delete()){
		            return redirect("bienes_unidades")->with([
		                'flash_message' => 'Unidad eliminada correctamente.',
		                'flash_class' => 'alert-success'
		            ]);
		        }else{
		            return redirect("bienes_unidades")->with([
		                'flash_message' => 'Ha ocurrido un error.',
		                'flash_class' => 'alert-danger',
		                'flash_important' => true
		            ]);
		        }
		    }else{
            return redirect("bienes_unidades")->with([
                'flash_message' => 'Esta unidad tiene bienes asociados.',
                'flash_class' => 'alert-danger',
                'flash_important' => true
            ]);
		    }
    }

    public function getDetalles($id){
        $unidad = Unidad::findOrFail($id);
        $detalles = $unidad->detalles();
        
        return response()->json($detalles);
    }
}
