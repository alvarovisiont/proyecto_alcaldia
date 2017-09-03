<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compras\Com_ordenes_detalle;

class AjaxController extends Controller
{
    //Compras
	public function traer_detalles_ordenes(Request $request)
	{

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
}
