<?php

namespace App\Http\Controllers\Compras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Compras\Com_unidades;
use Session;

class UnidadesMedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $unidades = Com_unidades::all();
        return view('compras.unidades.index')->with('unidades', $unidades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $unidades = new Com_unidades;
        $codigo_unidad = Com_unidades::all();
        $codigo2 = $codigo_unidad->last();
        if($codigo2 == null){
                $codigo = 1;
            }else{

        $codigo = $codigo2->codigo + 1;
    }
        $ruta = 'com_unidades';
        $datos = ['unidades' => $unidades, 'ruta' => $ruta, 'edit' => false, 'codigo' => $codigo];
        return view('compras.unidades.create')->with($datos);
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
        Com_unidades::create($request->all());
        Session::flash('flash_create', 'Unidad creada con éxito');
        return redirect('com_unidades');
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
        $unidades =  Com_unidades::findOrFail($id);

        $ruta = 'com_unidades/'.$id;
        $datos = ['unidades' => $unidades, 'ruta' => $ruta, 'edit' => true];
        return view('compras.unidades.update')->with($datos);
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
        $unidades = Com_unidades::findOrFail($id);
        $unidades->fill($request->all());
        $unidades->update();
        Session::flash('flash_create', 'Unidad modificada con éxito');
        return redirect('/com_unidades');
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
        Com_unidades::where('id',$id)->delete();
    }
}
