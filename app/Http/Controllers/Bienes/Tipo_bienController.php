<?php

namespace App\Http\Controllers\Bienes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bienes\Tipo_bien;
use App\Bienes\Nomenclatura;

class Tipo_bienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoBien = Tipo_bien::all();

        return view('bienes.tipo_bien.index',['tipos'=>$tipoBien]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bienes.tipo_bien.create');
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
            'subgrupo' => 'required',
            'descripcion' => 'required'
        ]);

        $tipo = new Tipo_bien;
        $tipo->fill($request->all());

        if($request->subsubgrupo){
            $tipo->nomenclatura_id = $request->subsubgrupo;            
        }else{
            $nomenclatura = new Nomenclatura;
            $tipo->nomenclatura_id = $nomenclatura->getSubgrupoID($request->grupo,$request->subgrupo);
        }

        $tipo->codigo = $tipo->generate_code();

        if($tipo->save()){
            return redirect('bienes_tipo_bien')->with([
            'flash_message' => 'Tipo Bien agregado correctamente.',
            'flash_class' => 'alert-success']);
        }else{
            return redirect('bienes_tipo_bien')->with([
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
        $tipoBien    = Tipo_bien::findOrFail($id);
        $subgrupo = $tipoBien->nomenclatura->getSubgrupoID($tipoBien->nomenclatura->grupo,$tipoBien->nomenclatura->sub_grupo);

        if($tipoBien->nomenclatura->tipo==1){
            $subsubgrupo = 0;
        }else{
            $subsubgrupo = $tipoBien->nomenclatura_id;
        }

        return view('bienes.tipo_bien.edit',['tipo'=>$tipoBien,'subgrupo'=>$subgrupo,'subsubgrupo'=>$subsubgrupo]);
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
        $tipo = Tipo_bien::findOrFail($id);

        $this->validate($request,[
            'subgrupo' => 'required',
            'descripcion' => 'required'
        ]);

        $tipo->fill($request->all());

        if($request->subsubgrupo){
            $tipo->nomenclatura_id = $request->subsubgrupo;            
        }else{
            $nomenclatura = new Nomenclatura;
            $tipo->nomenclatura_id = $nomenclatura->getSubgrupoID($request->grupo,$request->subgrupo);
        }

        if($tipo->save()){
            return redirect('bienes_tipo_bien')->with([
            'flash_message' => 'Tipo Bien modificado correctamente',
            'flash_class' => 'alert-success']);
        }else{
            return redirect('bienes_tipo_bien')->with([
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
        $tipo = Tipo_bien::findOrFail($id);

        $bienes = $tipo->bienes()->get();

        if(count($bienes) == 0){
		        if($tipo->delete()){
		            return redirect("bienes_tipo_bien")->with([
		                'flash_message' => 'Tipo Bien eliminado correctamente.',
		                'flash_class' => 'alert-success'
		            ]);
		        }else{
		            return redirect("bienes_tipo_bien")->with([
		                'flash_message' => 'Ha ocurrido un error.',
		                'flash_class' => 'alert-danger',
		                'flash_important' => true
		            ]);
		        }
		    }else{
            return redirect("bienes_tipo_bien")->with([
                'flash_message' => 'Este Tipo de Bien tiene Bienes agregados.',
                'flash_class' => 'alert-danger',
                'flash_important' => true
            ]);		    	
		    }
    }
}
