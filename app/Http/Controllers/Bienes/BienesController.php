<?php

namespace App\Http\Controllers\Bienes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bienes\Bien;
use App\Bienes\Unidad;
use App\Bienes\Nomenclatura;
use App\Bienes\Movimiento;
use App\Bienes\Concepto;
use QrCode;


class BienesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bienes = Bien::all();

        return view('bienes.bienes.index',['bienes'=>$bienes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bien         = new Bien;
        $codigo       = $bien->generateCodigo();
        $unidades     = Unidad::all();
        $nomenclatura = new Nomenclatura;
        $subgrupos    = $nomenclatura->getSubGrupos(1);

        return view('bienes.bienes.create',['codigo'=>$codigo,'unidades'=>$unidades,'subgrupos'=>$subgrupos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'unidad_id' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required',
            'precio' => 'required'
        ]);

        $bien = new Bien;

        $bien->fill($request->all());
        $codigo = $bien->generateCodigo();
        $bien->codigo = $codigo;
        $fecha = date("Y-m-d",strtotime($request->fecha));
        $bien->fecha = $fecha;
        $bien->unidad_detalles_id = $request->seccion;
        $bien->concepto_id  = 1;
        $bien->status = 1;
        $bien->unidad1  = $request->unidad_id;
        $bien->seccion1 = $request->seccion;

	    	$qrpath = asset('img/qr')."/{$codigo}.png";
	    	$bien->qr_code = $qrpath;

	    	$qr = $bien->qr_redirect($codigo);

        QrCode::format('png')->size(200)->encoding('UTF-8')->generate($qr,"../public/img/qr/{$codigo}.png");

        if($bien->save()){
        		$movimiento = new movimiento;
        		$movimiento->fill($request->all());
        		$movimiento->fecha = $fecha;
        		$movimiento->unidad_detalles_id = $request->seccion;
        		$movimiento->concepto_id = 1;
        		$bien->movimientos()->save($movimiento);

            return redirect('/bienes_bienes')->with([
            'flash_message' => 'Bien agregado correctamente.',
            'flash_class' => 'alert-success']);
        }else{
            return redirect('/bienes_bienes')->with([
            'flash_message' => 'Ha ocurrido un error.',
            'flash_class' => 'alert-danger',
            'alert-important' => true
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bien = Bien::findOrFail($id);
        $movimientos = $bien->movimientos();

        $unidades = Unidad::all();

        if($bien->tipo->nomenclatura->tipo==1){
            $sub    = $bien->tipo->nomenclatura->descripcion; 
            $subsub = "";
        }else{
            $sub    = $bien->tipo->nomenclatura->getParentDescripcion();
            $subsub = $bien->tipo->nomenclatura->descripcion;
        }

        $desincorporado = $bien->concepto->codigo > 19;

        $conceptos = $desincorporado?Concepto::where('tipo','Incorporación')->get():Concepto::where('tipo','Desincorporación')->get();

        return view('bienes.bienes.view',['bien'=>$bien,
        																	'subgrupo'=>$sub,
        																	'subsubgrupo'=>$subsub,
        																	'movimientos'=>$movimientos,
        																	'unidades'=>$unidades,
        																	'desincorporado'=>$desincorporado,
        																	'conceptos'=>$conceptos]);
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
    }

    public function bien($codigo){
    		$bien = Bien::where('codigo',$codigo)->first();

        $movimientos = $bien->movimientos();

        $unidades = Unidad::all();

        if($bien->tipo->nomenclatura->tipo==1){
            $sub    = $bien->tipo->nomenclatura->descripcion; 
            $subsub = "";
        }else{
            $sub    = $bien->tipo->nomenclatura->getParentDescripcion();
            $subsub = $bien->tipo->nomenclatura->descripcion;
        }

        $desincorporado = $bien->concepto->codigo > 19;

        $conceptos = $desincorporado?Concepto::where('tipo','Incorporación')->get():Concepto::where('tipo','Desincorporación')->get();

        return view('bienes.bienes.public',['bien'=>$bien,
        																	'subgrupo'=>$sub,
        																	'subsubgrupo'=>$subsub,
        																	'movimientos'=>$movimientos,
        																	'unidades'=>$unidades,
        																	'desincorporado'=>$desincorporado,
        																	'conceptos'=>$conceptos]);
    }
}
