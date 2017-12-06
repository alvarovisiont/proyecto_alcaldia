<?php

namespace App\Http\Controllers\Contabilidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

use App\Models\Contabilidad\Cont_asientos;
use App\Models\Contabilidad\Cont_asiento_detalle;

class ReportesController extends Controller
{
    //
    public function libro_mayor(Request $request)
    {
    	return view('contabilidad.reportes.libro_mayor');
    }

    public function libro_mayor_pdf(Request $request)
    {
    	$desde = date('Y-m-d',strtotime($request->get('desde')));
    	$hasta = date('Y-m-d',strtotime($request->get('hasta')));

    	$sql = "SELECT * from(
  				SELECT sum(debe) as debe, sum(haber) as haber, (SELECT p21 from cont__master_accounts where id = asiend.cont__master_accounts_id) as p21, asien.descripcion,
  					date_format(asien.fecha,'%d-%m-%Y') as fecha, 
  					asien.id as id_asiento,(SELECT descripcion from cont__master_accounts where id = asiend.cont__master_accounts_id) as cuenta
  				from cont_asiento_detalles as asiend INNER JOIN cont_asientos as asien ON asien.id = asiend.cont_asientos_id WHERE asien.fecha between '$desde' and '$hasta' 
  				GROUP BY asiend.cont_asientos_id,p21,asien.descripcion,asien.fecha,asien.id,asiend.cont__master_accounts_id
				) as tt ORDER BY tt.id_asiento asc";

    	$asientos = DB::select($sql);

    	$pdf = PDF::loadView('contabilidad.reportes.pdf.libro_mayor_pdf',['asientos'=>$asientos,'desde' => $request->get('desde'),'hasta' => $request->get('hasta')]);

    	return $pdf->stream('libro_mayor.pdf');
    }
}
