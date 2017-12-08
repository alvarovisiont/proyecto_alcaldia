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
  				SELECT sum(asiend.debe) as debe, sum(asiend.haber) as haber, (SELECT p21 from cont__master_accounts where id = asiend.cont__master_accounts_id) as p21, asien.descripcion,
  					date_format(asien.fecha,'%d-%m-%Y') as fecha, 
  					asien.id as id_asiento,(SELECT descripcion from cont__master_accounts where id = asiend.cont__master_accounts_id) as cuenta
  				from cont_asiento_detalles as asiend INNER JOIN cont_asientos as asien ON asien.id = asiend.cont_asientos_id WHERE asien.fecha between '$desde' and '$hasta' 
  				GROUP BY asiend.cont_asientos_id,p21,asien.descripcion,asien.fecha,asien.id,asiend.cont__master_accounts_id
				) as tt ORDER BY tt.id_asiento asc";

    	$asientos = DB::select($sql);

    	$pdf = PDF::loadView('contabilidad.reportes.pdf.libro_mayor_pdf',['asientos'=>$asientos,'desde' => $request->get('desde'),'hasta' => $request->get('hasta')]);

    	return $pdf->stream('libro_mayor.pdf');
    }

    public function balance_comprobacion()
    {
      return view('contabilidad.reportes.balance_comprobacion');
    }

    public function balance_comprobacion_pdf(Request $request)
    {
      $hasta = date('Y-m-d',strtotime($request->get('hasta')));
      $año   = date('Y',strtotime($request->get('hasta')));
      $desde = $año.'-01-01';


      $sql = "SELECT 
              (SELECT SUM( asiend.DEBE - asiend.HABER ) from cont_asiento_detalles as asiend 
              WHERE (asiend.cont__master_accounts_id = (SELECT id from cont__master_accounts where p21 = 102) ) and (asien.id = asiend.cont_asientos_id) ) as sal102,

              (SELECT SUM( asiend.DEBE - asiend.HABER ) from cont_asiento_detalles as asiend 
              WHERE (asiend.cont__master_accounts_id = (SELECT id from cont__master_accounts where p21 = 122) ) and (asien.id = asiend.cont_asientos_id) ) as sal122,

              (SELECT SUM( asiend.DEBE - asiend.HABER ) from cont_asiento_detalles as asiend 
              WHERE (asiend.cont__master_accounts_id = (SELECT id from cont__master_accounts where p21 = 126) ) and (asien.id = asiend.cont_asientos_id) ) as sal126,

              (SELECT SUM( asiend.DEBE - asiend.HABER ) from cont_asiento_detalles as asiend 
              WHERE (asiend.cont__master_accounts_id = (SELECT id from cont__master_accounts where p21 = 128) ) and (asien.id = asiend.cont_asientos_id) ) as sal128,

              (SELECT SUM( asiend.DEBE - asiend.HABER ) from cont_asiento_detalles as asiend 
              WHERE (asiend.cont__master_accounts_id = (SELECT id from cont__master_accounts where p21 = 132) ) and (asien.id = asiend.cont_asientos_id) ) as sal132,

              (SELECT SUM( asiend.DEBE - asiend.HABER ) from cont_asiento_detalles as asiend 
              WHERE (asiend.cont__master_accounts_id = (SELECT id from cont__master_accounts where p21 = 200) ) and (asien.id = asiend.cont_asientos_id) ) as sal200,

              (SELECT SUM( asiend.DEBE - asiend.HABER ) from cont_asiento_detalles as asiend 
              WHERE (asiend.cont__master_accounts_id = (SELECT id from cont__master_accounts where p21 = 212) ) and (asien.id = asiend.cont_asientos_id) ) as sal212,

              (SELECT SUM( asiend.DEBE - asiend.HABER ) from cont_asiento_detalles as asiend 
              WHERE (asiend.cont__master_accounts_id = (SELECT id from cont__master_accounts where p21 = 214) ) and (asien.id = asiend.cont_asientos_id) ) as sal214,

              (SELECT SUM( asiend.DEBE - asiend.HABER ) from cont_asiento_detalles as asiend 
              WHERE (asiend.cont__master_accounts_id = (SELECT id from cont__master_accounts where p21 = 220) ) and (asien.id = asiend.cont_asientos_id) ) as sal220,

              (SELECT SUM( asiend.DEBE - asiend.HABER ) from cont_asiento_detalles as asiend 
              WHERE (asiend.cont__master_accounts_id = (SELECT id from cont__master_accounts where p21 = 240) ) and (asien.id = asiend.cont_asientos_id) ) as sal240,

              (SELECT SUM( asiend.DEBE - asiend.HABER ) from cont_asiento_detalles as asiend 
              WHERE (asiend.cont__master_accounts_id = (SELECT id from cont__master_accounts where p21 = 300) ) and (asien.id = asiend.cont_asientos_id) ) as sal300,

              (SELECT SUM( asiend.haber - asiend.debe ) from cont_asiento_detalles as asiend 
              WHERE (asiend.cont__master_accounts_id = (SELECT id from cont__master_accounts where p21 = 101) ) and (asien.id = asiend.cont_asientos_id) ) as sal101,

              (SELECT SUM( asiend.haber - asiend.debe ) from cont_asiento_detalles as asiend 
              WHERE (asiend.cont__master_accounts_id = (SELECT id from cont__master_accounts where p21 = 103) ) and (asien.id = asiend.cont_asientos_id) ) as sal103,

              (SELECT SUM( asiend.haber - asiend.debe ) from cont_asiento_detalles as asiend 
              WHERE (asiend.cont__master_accounts_id = (SELECT id from cont__master_accounts where p21 = 109) ) and (asien.id = asiend.cont_asientos_id) ) as sal109,

              (SELECT SUM( asiend.haber - asiend.debe ) from cont_asiento_detalles as asiend 
              WHERE (asiend.cont__master_accounts_id = (SELECT id from cont__master_accounts where p21 = 133) ) and (asien.id = asiend.cont_asientos_id) ) as sal133,

              (SELECT SUM( asiend.haber - asiend.debe ) from cont_asiento_detalles as asiend 
              WHERE (asiend.cont__master_accounts_id = (SELECT id from cont__master_accounts where p21 = 199) ) and (asien.id = asiend.cont_asientos_id) ) as sal199,

              (SELECT SUM( asiend.haber - asiend.debe ) from cont_asiento_detalles as asiend 
              WHERE (asiend.cont__master_accounts_id = (SELECT id from cont__master_accounts where p21 = 299) ) and (asien.id = asiend.cont_asientos_id) ) as sal299,

              (SELECT SUM( asiend.haber - asiend.debe ) from cont_asiento_detalles as asiend 
              WHERE (asiend.cont__master_accounts_id = (SELECT id from cont__master_accounts where p21 = 301) ) and (asien.id = asiend.cont_asientos_id) ) as sal301,

              (SELECT SUM( asiend.haber - asiend.debe ) from cont_asiento_detalles as asiend 
              WHERE (asiend.cont__master_accounts_id = (SELECT id from cont__master_accounts where p21 = 303) ) and (asien.id = asiend.cont_asientos_id) ) as sal303

              from cont_asientos as asien
              where asien.fecha between '$desde' and '$hasta'";

      $balance = DB::select($sql);
      $datos = ['balance' => $balance, 'hasta' => $request->get('hasta'),'total_debe' => 0,'total_haber' => 0];

      $pdf = PDF::loadView('contabilidad.reportes.pdf.balance_comprobacion_pdf',$datos);

      return $pdf->stream('balance_comprobacion.pdf');
    }
}
