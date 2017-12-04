<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compras\Com_ordenes_detalle;
use App\Models\Contabilidad\Cont_auxiliares;

class AjaxController extends Controller
{
    
	public function traer_detalles_ordenes(Request $request)
	{
		//Compras

		$detalles = Com_ordenes_detalle::select('*')->where('com_ordenes_id','=',$request->orden)->get();

		$datos = [];

		foreach ($detalles as $row) 
		{
			$row->base = number_format($row->base,2,',','.');
			$row->iva  = number_format($row->iva,2,',','.');
			$row->total = number_format($row->total,2,',','.');

			$datos[] = $row;
		}
        
    	return response()->json($datos);   
	}

	public function traer_auxliares_cuentas(Request $request)
	{
		// Contabilidad

		$aux = Cont_auxiliares::where('cont__master_accounts_id','=', $request->cuenta)
								->select('auxiliar','descripcion','id')
								->orderBy('auxiliar','asc')
								->get();

		return response()->json($aux);
	}
}
