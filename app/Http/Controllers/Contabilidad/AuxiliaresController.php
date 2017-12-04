<?php

namespace App\Http\Controllers\Contabilidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

use App\Models\Contabilidad\Cont_auxiliares;
use App\Models\Contabilidad\Cont_MasterAccount;
use App\Models\Contabilidad\Cont_asiento_detalle;
use App\Models\Contabilidad\Cont_config;

class AuxiliaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $auxiliares = Cont_auxiliares::all();
        return view('contabilidad.auxiliares.index')->with('auxiliares',$auxiliares);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $auxiliar = new Cont_auxiliares;
        $cuentas  = Cont_MasterAccount::all();
        $ruta   = "cont_auxiliares";
        $datos = ['auxiliar' => $auxiliar, 'ruta' => $ruta, 'edit' => false,'cuentas' => $cuentas];

        return view('contabilidad.auxiliares.create')->with($datos);
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
        $this->validate($request,[
            'auxiliar' => Rule::unique('cont_auxiliares')->where(function ($query) use ($request) {
                $query->where('cont__master_accounts_id', $request->cont__master_accounts_id);
            })
        ],
        [
            'auxiliar.unique' => 'Esta auxiliar ya ha sido registrado en esta cuenta'
        ]);

        $axuliar = new Cont_auxiliares;
        $axuliar->fill($request->all());
        $axuliar->cont_configs_id = Cont_config::configActivate()->id;
        $axuliar->save();

        return Redirect('cont_auxiliares');
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

        $auxiliar = Cont_auxiliares::findOrFail($id);
        $cuentas  = Cont_MasterAccount::all();

        $ruta   = "cont_auxiliares/".$id;
        $datos = ['auxiliar' => $auxiliar, 'ruta' => $ruta, 'edit' => true, 'cuentas' => $cuentas];

        return view('contabilidad.auxiliares.update')->with($datos);
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

        $this->validate($request,[
            'auxiliar' => Rule::unique('cont_auxiliares')->where(function ($query) use ($request) {
                $query->where('cont__master_accounts_id', $request->cont__master_accounts_id);
            }),
            'auxiliar' => Rule::unique('cont_auxiliares')->ignore($id)
        ],
        [
            'auxiliar.unique' => 'Esta auxiliar ya ha sido registrado en esta cuenta'
        ]);

        $config = Cont_auxiliares::findOrFail($id);
        $config->fill($request->all());
        $config->update();

        if($request->status == 1)
        {
            Cont_config::statusOffOn($id);
        }

        return redirect('/cont_auxiliares');
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
        $detalles = Cont_asiento_detalle::where('cont_auxiliares_id','=',$id)->get();
        if(count($detalles) > 0)
        {
            return redirect("/cont_auxiliares")->with([
                        "flash_message" => "No se pueden eliminar un Axuliar con Registros Asociados.",
                        "flash_class" => "alert-danger"
                    ]);
        }
        else
        {
            Cont_auxiliares::destroy($id);
            return redirect("/cont_auxiliares")->with([
                        "flash_message" => "Axuliar Eliminado con Éxito",
                        "flash_class" => "alert-success"
                    ]);
        }
        
            

        
            
        
    }
}
