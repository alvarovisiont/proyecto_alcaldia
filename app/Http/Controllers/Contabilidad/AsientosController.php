<?php

namespace App\Http\Controllers\Contabilidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

use App\Models\Contabilidad\Cont_config;
use App\Models\Contabilidad\Cont_asientos;
use App\Models\Contabilidad\Cont_asiento_detalle;
use App\Models\Contabilidad\Cont_MasterAccount;

class AsientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $asientos = Cont_asientos::all();
        return view('contabilidad.asientos.index')->with('asientos',$asientos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $asiento = new Cont_asientos;
        $ruta    = 'cont_asientos';
        $datos = ['asiento' => $asiento, 'ruta' => $ruta, 'edit' => false];
        return view('contabilidad.asientos.create')->with($datos);
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
        $asiento = new Cont_asientos;
        $asiento->fill($request->all());
        $asiento->fecha = date('Y-m-d',strtotime($request->fecha));
        $asiento->cont_configs_id = Cont_config::configActivate()->id;
        $asiento->save();

        return Redirect('cont_asientos');
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
        $asiento = Cont_asientos::findOrFail($id);
        $cuentas = Cont_MasterAccount::select('cuenta','descripcion','id')->get();
        
        $detalles = Cont_asiento_detalle::where('cont_asientos_id','=',$id)
                    ->join('cont__master_accounts','cont__master_accounts.id','=','cont_asiento_detalles.cont__master_accounts_id')
                    ->leftJoin('cont_auxiliares','cont_auxiliares.id','=','cont_asiento_detalles.cont_auxiliares_id')
                    ->select('cont_asiento_detalles.*','cont__master_accounts.cuenta as cuenta_codigo','cont__master_accounts.descripcion as cuenta_descripcion','cont_auxiliares.auxiliar as cuenta_auxiliar','cont_auxiliares.descripcion as auxiliar_descripcion')
                    ->get();

        $datos = ['asiento' => $asiento,'detalles' => $detalles,'cuentas' => $cuentas,'debe' => '','haber' => '','contador' => 0];

        return view('contabilidad.asientos.show')->with($datos);

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
        $asiento = Cont_asientos::findOrFail($id);

        $ruta   = "cont_asientos/".$id;
        $datos = ['asiento' => $asiento, 'ruta' => $ruta, 'edit' => true];

        return view('contabilidad.asientos.update')->with($datos);
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
        $asiento = Cont_asientos::findOrFail($id);
        $asiento->fill($request->all());
        $asiento->fecha = date('Y-m-d',strtotime($request->fecha));
        $asiento->update();

        return redirect('/cont_asientos');
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
            Cont_asientos::destroy($id);
            return redirect("/cont_asientos")->with([
                        "flash_message" => "Asiento Eliminado con Éxito",
                        "flash_class" => "alert-success"
                    ]);

        }
        catch(\Illuminate\Database\QueryException $e)
        {
            return redirect("/cont_asientos")->with([
                        "flash_message" => "No se pueden eliminar un Asiento con Registros Asociados.",
                        "flash_class" => "alert-danger"
                    ]);
        }
    }
}
