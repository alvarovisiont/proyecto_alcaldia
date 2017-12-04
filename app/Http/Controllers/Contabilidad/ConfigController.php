<?php

namespace App\Http\Controllers\Contabilidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contabilidad\Cont_config;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $configuraciones = Cont_config::all();

        return view('contabilidad.config.config')->with('config',$configuraciones);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
        $config = new Cont_config;
        $ruta   = "cont_configuracion";
        $datos = ['config' => $config, 'ruta' => $ruta, 'edit' => false];

        return view('contabilidad.config.create')->with($datos);
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
        $result = Cont_config::create($request->all());
        
        Cont_config::statusOffOn($result->id);

        return redirect('/cont_configuracion');
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
        $config = Cont_config::findOrFail($id);

        $ruta   = "cont_configuracion/".$id;
        $datos = ['config' => $config, 'ruta' => $ruta, 'edit' => true];

        return view('contabilidad.config.update')->with($datos);
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
        $config = Cont_config::findOrFail($id);
        $config->fill($request->all());
        $config->update();

        if($request->status == 1)
        {
            Cont_config::statusOffOn($id);
        }

        return redirect('/cont_configuracion');
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
}
