<?php

namespace App\Http\Controllers\Bienes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bienes\Nomenclatura;

class NomenclaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nomenclaturas = Nomenclatura::all();

        return view('bienes.nomenclaturas.index',['nomenclaturas'=>$nomenclaturas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bienes.nomenclaturas.create');
    }


    public function createsub()
    {
        return view('bienes.nomenclaturas.createsub');
    }


    public function createsub2()
    {
        return view('bienes.nomenclaturas.createsub2');
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
    }

    public function storesub(Request $request)
    {
        $this->validate($request,[
            'grupo' => 'required',
            'descripcion' => 'required'
        ]);

        $subgrupo = new Nomenclatura;

        $subgrupo->fill($request->all());
        $subgrupo->tipo = 1;

        $subgrupo->sub_grupo = $subgrupo->last_subgrupo($request->grupo);

        if($subgrupo->save()){
            return redirect('bienes_nomenclaturas')->with([
            'flash_message' => 'Subgrupo agregado correctamente',
            'flash_class' => 'alert-success']);
        }else{
            return redirect('bienes_nomenclaturas')->with([
            'flash_message' => 'Ha ocurrido un error.',
            'flash_class' => 'alert-danger',
            'alert-important' => true
            ]);
        }
    }

    public function storesub2(Request $request)
    {
        $this->validate($request,[
            'grupo' => 'required',
            'sub_grupo' => 'required',
            'descripcion' => 'required'
        ]);

        $subsubgrupo = new Nomenclatura;

        $subsubgrupo->fill($request->all());
        $subsubgrupo->tipo = 2;

        $subsubgrupo->sub_sub_grupo = $subsubgrupo->last_subsubgrupo($request->grupo);

        if($subsubgrupo->save()){
            return redirect('bienes_nomenclaturas')->with([
            'flash_message' => 'Subsubgrupo agregado correctamente',
            'flash_class' => 'alert-success']);
        }else{
            return redirect('bienes_nomenclaturas')->with([
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
        $nomenclatura = Nomenclatura::findOrFail($id);

        $subgrupo = $nomenclatura->getSubgrupos($nomenclatura->grupo);

        return view('bienes.nomenclaturas.edit',['nomenclatura'=>$nomenclatura,'subgrupo'=>$subgrupo]);
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
    	$nomenclatura = Nomenclatura::findOrFail($id);
    	$this->validate($request,[
    		'grupo' => 'required',
    		'descripcion' => 'required'
    	]);

    	$nomenclatura->fill($request->all());

      if($nomenclatura->save()){
          return redirect('bienes_nomenclaturas')->with([
          'flash_message' => 'Elemento modificado correctamente.',
          'flash_class' => 'alert-success']);
      }else{
          return redirect('bienes_nomenclaturas')->with([
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
        $nomenclatura = Nomenclatura::findOrFail($id);

        if(count($nomenclatura->getTipoBienes()) == 0){
            if($nomenclatura->delete()){
                return redirect("bienes_nomenclaturas")->with([
                    'flash_message' => 'Nomenclatura eliminada correctamente.',
                    'flash_class' => 'alert-success'
                ]);
            }else{
                return redirect("bienes_nomenclaturas")->with([
                    'flash_message' => 'Ha ocurrido un error.',
                    'flash_class' => 'alert-danger',
                    'flash_important' => true
                ]);
            }
        }else{
            return redirect("bienes_nomenclaturas")->with([
                'flash_message' => 'Error! Esta nomenclatura tiene Tipo de Bienes asociados.',
                'flash_class' => 'alert-danger',
                'flash_important' => true
            ]);
        }
    }

    public function getSubgrupos(Request $request){
        $nomenclatura = new Nomenclatura;

        $subgrupos = $nomenclatura->getSubgrupos($request->grupo);

        return response()->json($subgrupos);
    }


    public function getSubgrupos2(Request $request){
        $nomenclatura = new Nomenclatura;

        $subsubgrupos = $nomenclatura->getSubgrupos2($request->grupo,$request->subgrupo);

        return response()->json($subsubgrupos);
    }

    public function getTipoBienes($id){
        $nomenclatura = Nomenclatura::findOrFail($id);

        $bienes = $nomenclatura->getTipoBienes();

        return response()->json($bienes);
    }
}
