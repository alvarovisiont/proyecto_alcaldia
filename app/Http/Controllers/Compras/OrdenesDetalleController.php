<?php

namespace App\Http\Controllers\Compras;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Compras\Com_ordenes;
use App\Compras\Com_ordenes_detalle;
use App\Compras\Com_insumos;
use App\Compras\Com_config;

class OrdenesDetalleController extends Controller
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
    public function create(Request $request)
    {
        //
        $orden = false;
        $detalles = false;

        if($request->orden != "")
        {
            $orden = $request->orden;

            $detalles = Com_ordenes_detalle::select('*')->where('com_ordenes_id','=',$orden)->get();
        }



        
        $ordenes = Com_ordenes::select('id','codigo')->get();

        $insumos = Com_insumos::select('id','descripcion')->get();

        $datos = ['orden' => $orden,'ordenes' => $ordenes, 'insumos' => $insumos,'detalles' => $detalles];


        return view('compras.ordenes.detalle_ordenes.create')->with($datos);
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
        $subtotal = $request->base * $request->cantidad;
        $iva = $subtotal * $request->iva_porcentaje / 100;
        $total = $subtotal + $iva;
        $año = Com_config::select('ano')->first();
        
        $detalle = new Com_ordenes_detalle;
        $detalle->com_ordenes_id = $request->com_ordenes_id;
        $detalle->item_insumo = $request->item_insumo;
        $detalle->descripcion = $request->descripcion;
        $detalle->cantidad    = $request->cantidad;
        $detalle->unidad      = $request->unidad;
        $detalle->base        = $request->base;
        $detalle->sub_total   = $subtotal;
        $detalle->iva         = $iva;
        $detalle->iva_porcentaje = $request->iva_porcentaje;
        $detalle->total       = $total;
        $detalle->ano         = $año->ano;
        $detalle->save();

        $data = [
            'descripcion' => $request->descripcion,
            'unidad' => $request->unidad,
            'cantidad' => $request->cantidad,
            'base' => number_format($request->base,2,',','.'),
            'iva' => number_format($iva,2,',','.'),
            'iva_porcentaje' => $request->iva_porcentaje,
            'total' => number_format($total,2,',','.'),
            'ano' => $año->ano,
            'eliminar' => '<a href="#" id="eliminar_detalle" data-eliminar="'.$detalle->id.'" class="eliminar"><i class="fa fa-trash"></i></a></tr>'
        ];

        return response()->json($data);

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
        Com_ordenes_detalle::destroy($id);
    }
}
