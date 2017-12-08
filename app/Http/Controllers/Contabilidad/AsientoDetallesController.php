<?php

namespace App\Http\Controllers\Contabilidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Contabilidad\Cont_asiento_detalle;
use App\Models\Contabilidad\Cont_config;

class AsientoDetallesController extends Controller
{
    //

    public function store(Request $request)
    {

    	$detalle = new Cont_asiento_detalle;
    	$detalle->fill($request->all());
        if($detalle->haber == null)
        {
            $detalle->haber = 0;
        }
        if($detalle->debe == null)
        {
            $detalle->debe = 0;
        }

    	$detalle->cont_configs_id = Cont_config::configActivate()->id;
    	$detalle->save();

    	return Redirect('/cont_asientos/'.$request->cont_asientos_id);

    }

    public function delete($id)
    {

    	$id_cuenta = Cont_asiento_detalle::findOrFail($id);

    	try
        {
            Cont_asiento_detalle::destroy($id);
            return redirect("/cont_asientos/".$id_cuenta->cont_asientos_id)->with([
                        "flash_message" => "Registro Eliminado con Éxito",
                        "flash_class" => "alert-success"
                    ]);

        }
        catch(\Illuminate\Database\QueryException $e)
        {
            return redirect("/cont_asientos_id/".$id_cuenta->cont_asientos_id)->with([
                        "flash_message" => "No se pueden eliminar un Registro que esta asociados con otros.",
                        "flash_class" => "alert-danger"
                    ]);
        }
    }
}
