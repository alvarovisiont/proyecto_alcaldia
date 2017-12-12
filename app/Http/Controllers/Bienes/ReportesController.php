<?php

namespace App\Http\Controllers\Bienes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bienes\Unidad;
use App\Bienes\Bien;
use App\Bienes\Unidad_detalles;
use App\Bienes\Reporte;
use App\Bienes\Concepto;
use PDF;

class ReportesController extends Controller
{
		public function bm1()
		{
			$unidades = Unidad::all();

			$desde = date('d-m-Y',strtotime(Bien::fecha_minima()));

			return view('bienes.reportes.bm1',['unidades'=>$unidades,'desde'=>$desde]);
		}

		public function bm1Pdf(Request $request)
		{
    	$unidad_detalle = Unidad_detalles::findOrFail($request->seccion);
    	$fecha = date('d-m-Y');
    	$desde = date("Y-m-d",strtotime($request->desde));
    	$hasta = date("Y-m-d",strtotime($request->hasta));
    	$bienes = Reporte::bienes_bm1($unidad_detalle->id,$desde,$hasta);

    	$pdf = PDF::loadView('bienes.reportes.plantillas.bm1',[
    																												'bienes'=>$bienes,
    																												'unidad_detalle'=>$unidad_detalle,
    																												'fecha' => $fecha,
    																												'desde'=>$request->desde,
    																												'hasta'=>$request->hasta
    																											]);

    	return $pdf->download('bm1.pdf');
		}

		public function bm2()
		{
			$unidades = Unidad::all();

			return view('bienes.reportes.bm2',['unidades'=>$unidades]);
		}

		public function bm2Pdf(Request $request)
		{
    	$unidad_detalle = Unidad_detalles::findOrFail($request->seccion);
    	$fecha = date('d-m-Y');
    	$desde = date("Y-m-d",strtotime($request->desde));
    	$hasta = date("Y-m-d",strtotime($request->hasta));
    	$movimientos = Reporte::bienes_bm2($unidad_detalle->id,$desde,$hasta);

    	$pdf = PDF::loadView('bienes.reportes.plantillas.bm2',[
    																												'movimientos'=>$movimientos,
    																												'unidad_detalle'=>$unidad_detalle,
    																												'fecha' => $fecha,
    																												'desde'=>$request->desde,
    																												'hasta'=>$request->hasta
    																											]);

    	return $pdf->download('bm2.pdf');
		}

		public function bm4()
		{
			$unidades = Unidad::all();
			$anios    = Bien::anios();

			return view('bienes.reportes.bm4',['unidades'=>$unidades,'anios'=>$anios]);
		}

		public function bm4Pdf(Request $request)
		{
    	$unidad_detalle = Unidad_detalles::findOrFail($request->seccion);
    	$fecha = date('d-m-Y');

    	$desde1 = '01-'.$request->mes.'-'.$request->anio;
	
			$fecha1 = new \DateTime($desde1);
			$last_day = $fecha1->modify('last day of this month');
			$last_day = $last_day->format('d');
			$hasta1 = $last_day.'-'.$request->mes.'-'.$request->anio;

    	$desde = date("Y-m-d",strtotime($desde1));
    	$hasta = date("Y-m-d",strtotime($hasta1));

    	$exis_anterior = Reporte::exis_anterior($unidad_detalle->id,$desde);
    	$incorporacion = Reporte::incorporacion($unidad_detalle->id,$desde,$hasta);
    	$desincorporacionMenos60 = Reporte::desincorporacionMenos60($unidad_detalle->id,$desde,$hasta);
    	$desincorporacion60 = Reporte::desincorporacion60($unidad_detalle->id,$desde,$hasta);
			
			$total = ($exis_anterior + $incorporacion) - ($desincorporacionMenos60 - $desincorporacion60);

    	$pdf = PDF::loadView('bienes.reportes.plantillas.bm4',[
    																												'unidad_detalle'=>$unidad_detalle,
    																												'fecha' => $fecha,
    																												'desde' => $desde1,
    																												'hasta' => $hasta1,
    																												'exis_anterior' => $exis_anterior,
    																												'incorporacion' => $incorporacion,
    																												'desincorporacionMenos60' => $desincorporacionMenos60,
    																												'desincorporacion60' => $desincorporacion60,
    																												'total' => $total
    																											]);

    	return $pdf->download('bm4.pdf');
		}

		public function desincorporaciones()
		{
			$conceptos = Concepto::conceptos();

			return view('bienes.reportes.desincorporaciones',['conceptos'=>$conceptos]);
		}

		public function incorporaciones()
		{
			$conceptos = Concepto::conceptos(1);

			return view('bienes.reportes.incorporaciones',['conceptos'=>$conceptos]);
		}

		public function des_incorporacionesPdf(Request $request)
		{
    	$unidad_detalle = Concepto::Conceptos();
    	$fecha = date('d-m-Y');

    	$desde = date("Y-m-d",strtotime($request->desde));
    	$hasta = date("Y-m-d",strtotime($request->hasta));

    	$movimientos = Reporte::des_incorporaciones($request->concepto_id,$desde,$hasta);
    	$total = $movimientos->sum('precio');
    	$name = $request->tipo == 1 ? 'incorporaciones' : 'desincorporaciones';

    	$pdf = PDF::loadView('bienes.reportes.plantillas.des_incorporaciones',[
    																												'movimientos' => $movimientos,
    																												'unidad_detalle'=>$unidad_detalle,
    																												'fecha' => $fecha,
    																												'desde' => $desde,
    																												'hasta' => $hasta,
    																												'total' => $total,
    																												'name' => $name
    																											]);

    	return $pdf->download($name.'.pdf');
		}

		public function unidades(){
			$unidades = Unidad::all();

			return view('bienes.reportes.unidades',['unidades'=>$unidades]);
		}

		public function unidadesPdf(Request $request){
    	$fecha = date('d-m-Y');
			$unidad = $request->unidad_id > 0 ? $request->unidad_id : false;

    	$desde = date("Y-m-d",strtotime($request->desde));
    	$hasta = date("Y-m-d",strtotime($request->hasta));

			$unidades = Reporte::unidades($unidad);

			$pdf = PDF::loadView('bienes.reportes.plantillas.unidades',['unidades'=>$unidades,
    																											'fecha' => $fecha,
																													'desde' => $desde,
																													'hasta' => $hasta,
																													'xdesde' => $request->desde,
																													'xhasta' => $request->hasta
																												]);

    	return $pdf->download('Reporte_total_unidades.pdf');

		}
}
