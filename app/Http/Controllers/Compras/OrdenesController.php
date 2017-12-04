<?php

namespace App\Http\Controllers\Compras;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Compras\Com_ordenes;
use App\Models\Compras\Com_ordenes_detalle;
Use App\Models\Compras\Com_requisiciones;
Use App\Models\Compras\Com_provee;
use App\Models\Compras\Com_config;

class OrdenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $ano = Com_config::año_activo();

        $ordenes = Com_ordenes::select('*')->whereRaw(" YEAR(fecha_orden) = $ano->ano ")->get();
        $com_detalle = Com_ordenes_detalle::select('*')->where('ano','=',$ano->ano)->get();

        $datos = ['ordenes' => $ordenes,'detalle' => $com_detalle];
        return view('compras.ordenes.index')->with($datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $orden = new Com_ordenes;
        $requisiciones = Com_requisiciones::select('codigo','descripcion','fecha','departamento_id')->get();
        
        $requisiciones->each(function($requisiciones){
            $requisiciones->departamento;
        });

        $max = Com_ordenes::max('id');

        $codigo = "";

        if($max ==  null)
        {
            $codigo = 'OC001';
        }
        else
        {
            $max = $max + 1;
            
            $codigo = 'OC00'.$max;

        }
        $provees = Com_provee::select('rif_cedula','razon_social','direccion')->get();
        $ruta  = 'com_ordenes';
        $edit = false;

        $datos = ['ruta' => $ruta, 'orden' => $orden, 'requisiciones' => $requisiciones,'provees' => $provees, 'codigo' => $codigo, 'edit' => $edit];

        return view('compras.ordenes.create')->with($datos);
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
        Com_ordenes::create($request->all());

        return redirect('com_ordenes');
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
        $orden = Com_ordenes::findOrFail($id);

        return view('compras.ordenes.show',['orden' => $orden]);
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
        $orden = Com_ordenes::findOrFail($id);
        $requisiciones = Com_requisiciones::select('codigo','descripcion','fecha','departamento_id')->get();
        
        $requisiciones->each(function($requisiciones){
            $requisiciones->departamento;
        });

        
        $provees = Com_provee::select('rif_cedula','razon_social','direccion')->get();
        $ruta  = 'com_ordenes/'.$id;
        $edit = true;

        $datos = ['ruta' => $ruta, 'orden' => $orden, 'requisiciones' => $requisiciones,'provees' => $provees, 'codigo' => false, 'edit' => $edit];

        return view('compras.ordenes.edit')->with($datos);
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
        $orden = Com_ordenes::findOrFail($id);
        $orden->fill($request->all());
        $orden->update();

        return redirect('/com_ordenes');


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
        try
        {
            Com_ordenes::destroy($id);
            return redirect("/com_ordenes")->with([
                        "flash_message" => "Orden Eliminada con Éxito.",
                        "flash_class" => "alert-success"
                    ]);
            
        }
        catch(\Illuminate\Database\QueryException $e)
        {   
            return redirect("/com_ordenes/{$id}")->with([
                        "flash_message" => "No se pueden eliminar Ordenes con Detalles.",
                        "flash_class" => "alert-danger"
                    ]);
        }
    }
}
