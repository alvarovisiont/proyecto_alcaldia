<?php

namespace App\Http\Controllers\Bienes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bienes\Concepto;

class ConceptosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conceptos = Concepto::all();

        return view('bienes.conceptos.index',['conceptos'=>$conceptos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bienes.conceptos.create');
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
            'tipo' => 'required',
            'status' => 'required'
        ]);

        $concepto = new Concepto;
        $concepto->fill($request->all());
        $concepto->codigo = $concepto->generate_code();

        if($concepto->save()){
            return redirect('bienes_conceptos')->with([
            'flash_message' => 'Concepto agregado correctamente.',
            'flash_class' => 'alert-success']);
        }else{
            return redirect('bienes_conceptos')->with([
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
        $concepto = Concepto::findOrFail($id);

        return view('bienes.conceptos.edit',['concepto'=>$concepto]);
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
        $concepto = Concepto::findOrFail($id);

        $this->validate($request,[
            'descripcion' => 'required',
            'tipo' => 'required',
            'status' => 'required'
        ]);

        $concepto->fill($request->all());

        if($concepto->save()){
            return redirect('bienes_conceptos')->with([
            'flash_message' => 'Concepto modificado correctamente.',
            'flash_class' => 'alert-success']);
        }else{
            return redirect('bienes_conceptos')->with([
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
        $concepto = Concepto::findOrFail($id);

        $bienes = $concepto->bienes()->get();

        if(count($bienes)==0){
		        if($concepto->delete()){
		            return redirect("bienes_conceptos")->with([
		                'flash_message' => 'Concepto eliminado correctamente.',
		                'flash_class' => 'alert-success'
		            ]);
		        }else{
		            return redirect("bienes_conceptos")->with([
		                'flash_message' => 'Ha ocurrido un error.',
		                'flash_class' => 'alert-danger',
		                'flash_important' => true
		            ]);
		        }
	      }else{
            return redirect("bienes_conceptos")->with([
                'flash_message' => 'Este concepto tiene bienes agregados.',
                'flash_class' => 'alert-danger',
                'flash_important' => true
            ]);

	      }
    }
}
