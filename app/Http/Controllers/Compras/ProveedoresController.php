<?php

namespace App\Http\Controllers\Compras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Compras\Com_provee;

use Session;


class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $proveedores = Com_provee::all();
        return view('compras.proveedores.index')->with('proveedores', $proveedores);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $proveedores = new Com_provee;
        $ruta = 'com_proveedores';
        $datos = ['proveedores' => $proveedores, 'ruta' => $ruta, 'edit' => false];
        return view('compras.proveedores.create')->with($datos);
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
        Com_provee::create($request->all());
        Session::flash('flash_create', 'Proveedor creado con éxito');
        return redirect('com_proveedores');
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
        $proveedores =  Com_provee::findOrFail($id);
        $ruta = 'com_proveedores/'.$id;
        $datos = ['proveedores' => $proveedores, 'ruta' => $ruta, 'edit' => true];
        return view('compras.proveedores.update')->with($datos);
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
        $provee = Com_provee::findOrFail($id);
        $provee->fill($request->all());
        $provee->update();
        Session::flash('flash_create', 'Proveedor modificado con éxito');
        return redirect('/com_proveedores');
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
        Com_provee::where('id',$id)->delete();
    }
}
