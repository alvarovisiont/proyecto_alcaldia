<?php

namespace App\Http\Controllers\Compras;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Com_insumos;
use App\Com_unidades;

class InsumosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insumos = Com_insumos::all();

        return view('compras.insumos.index',['insumos' => $insumos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Com_unidades::all();
        $insumos = Com_insumos::all();
        $insumo_id = $insumos->last();
        $codigo = $insumo_id->id + 1;


        
        return view('compras.insumos.create',['unidad' => $unidades,'codigo' => $codigo]);
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
        $insumo = new Com_insumos;
        $insumo = $insumo->fill($request->all());
        if($insumo->save())
        {
            $with = [
            'flash_message' => 'Se registro el insumo correctamente!',
            'flash_class' => 'alert-success'];

        }else{
            $with = [
            'flash_message' => 'Ha ocurrido un error.',
            'flash_class' => 'alert-danger',
            'alert-important' => true
            ];
        }
        //dd($with);
        return redirect('/insumos')->with($with);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $insumo = Com_insumos::findOrFail($id);

        return view('compras.insumos.ver',['insumo' => $insumo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $insumo = Com_insumos::findOrFail($id);
        $unidad = Com_unidades::all();

        return view('compras.insumos.modificar',['insumo' => $insumo,'unidad' => $unidad]);
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
        $insumo = Com_insumos::findOrFail($id);
        $insumo->fill($request->all());
        if($insumo->save())
        {
            $with = [
            'flash_message' => 'Se modifico el insumo correctamente!',
            'flash_class' => 'alert-success'];

        }else{
            $with = [
            'flash_message' => 'Ha ocurrido un error.',
            'flash_class' => 'alert-danger',
            'alert-important' => true
            ];
        }
        //dd($with);
        return redirect()->route('insumos.index')->with($with);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $insumo = Com_insumos::findOrFail($id);
        //$usuarios = $insumo->usuarios()->count();
        /*if($usuarios > 0)
        {
            $with = [
            'flash_message' => 'Este rol tiene usuarios asociados , no se puede eliminar!',
            'flash_class' => 'alert-danger'];
        }else{*/

            if($insumo->destroy($id))
            {
                $with = [
                'flash_message' => 'Se Elimino correctamente!',
                'flash_class' => 'alert-danger'];
            }else{
                $with = [
                'flash_message' => 'Ocurrio un error inesperado!',
                'flash_class' => 'alert-danger'];
            }
            
        
        return redirect()->route('insumos.index')->with($with);
    }
}
