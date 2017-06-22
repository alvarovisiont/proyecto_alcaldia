<?php

namespace App\Http\Controllers\Compras;
use Barryvdh\DomPDF\Facade as PDF;
use App\Com_insumos;
use App\Com_requisiciones;
use App\Com_unidades;
use App\Com_provee;
use App\Com_departamentos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportesController extends Controller
{
    public function index()
    {
    	return view('compras.reportes.index');
    }

    public function pdf_insumos()
    {
    	$insumos = Com_insumos::all();
    	$fecha = date('Y-m-d');
    	$pdf = PDF::loadView('compras.reportes.insumos',['insumos'=>$insumos]);

    	return $pdf->download('insumo'.$fecha.'.pdf');
    }

     public function requision()
    {
    	
    	return view('compras.reportes.requisiciones',['busqueda' => false]);
    }

    public function busqueda_requisicion(Request $request)
    {
    	$desde = $request->input('desde');
    	$hasta = $request->input('hasta');

    //transformacion fecha DESDe a español
    $dia = substr($desde, 0, 2);
    $mes   = substr($desde, 3, 2);
    $ano = substr($desde, -4);
    $desdeF = $mes . '-' . $dia . '-' . $ano;
    //transformacion fecha hasta a español
    $dia = substr($hasta, 0, 2);
    $mes   = substr($hasta, 3, 2);
    $ano = substr($hasta, -4);
    $hastaF = $mes . '-' . $dia . '-' . $ano;

    $requision = new Com_requisiciones;
    $resultado = $requision->fechaBetween($desdeF,$hastaF);


        if ($resultado->count() > 0) {
         	$fecha = date('Y-m-d');
        	$pdf = PDF::loadView('compras.reportes.pdfrequisiciones',['requisicion'=>$resultado,'desde' => $desdeF,'hasta' => $hastaF]);
        	return $pdf->download('requisiciones'.$fecha.'.pdf');
            }else{
            return redirect('/re_requisicion')->with([
                'flash_message' => 'No se encontraron resultados.',
                'flash_class' => 'alert-danger',
                'flash_important' => true,
                'busqueda' => false,
                ]);
          }//fin if
    
    }

    public function pdf_requision()
    {
    	$insumos = Com_requisiciones::all();
    	$fecha = date('Y-m-d');
    	$pdf = PDF::loadView('compras.reportes.insumos',['insumos'=>$insumos]);

    	return $pdf->download('insumo'.$fecha.'.pdf');
    }

    public function pdf_departamentos()
    {
        $departamentos = Com_departamentos::all();
        $fecha = date('Y-m-d');
        $pdf = PDF::loadView('compras.reportes.departamentos',['departamentos'=>$departamentos]);

        return $pdf->download('departamentos'.$fecha.'.pdf');
    }

    public function pdf_proveedor()
    {
        $proveedores = Com_provee::all();
        $fecha = date('Y-m-d');
        $pdf = PDF::loadView('compras.reportes.proveedores',['proveedores'=>$proveedores]);

        return $pdf->download('proveedores'.$fecha.'.pdf');
    }

    public function pdf_unidades()
    {
        $unidades = Com_unidades::all();
        $fecha = date('Y-m-d');
        $pdf = PDF::loadView('compras.reportes.unidades',['unidades'=>$unidades]);

        return $pdf->download('unidades'.$fecha.'.pdf');
    }
}
