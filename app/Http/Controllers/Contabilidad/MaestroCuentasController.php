<?php

namespace App\Http\Controllers\Contabilidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

use App\Models\Contabilidad\Cont_MasterAccount;
use App\Models\Contabilidad\Cont_config;

class MaestroCuentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cuentas = Cont_MasterAccount::all();

        return view('contabilidad.maestro_cuentas.index')->with('cuentas',$cuentas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cuenta = new Cont_MasterAccount;
        $ruta   = "cont_maestroCuentas";
        $datos = ['cuenta' => $cuenta, 'ruta' => $ruta, 'edit' => false];

        return view('contabilidad.maestro_cuentas.create')->with($datos);
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
            'cuenta' => 'unique:cont__master_accounts',
        ],
        [
            'cuenta.unique' => 'Esta cuenta ya ha sido registrada'
        ]);

        $account = new Cont_MasterAccount;
        $account->fill($request->all());
        $account->cont_configs_id = Cont_config::configActivate()->id;
        
        $account->save();

        return Redirect('/cont_maestroCuentas'); 
        
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
        $account = Cont_MasterAccount::findOrFail($id);

        $ruta   = "cont_maestroCuentas/".$id;
        $datos = ['cuenta' => $account, 'ruta' => $ruta, 'edit' => true];
        return view('contabilidad.maestro_cuentas.update')->with($datos);


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
            'cuenta' => 'unique:cont__master_accounts',
            'cuenta' => Rule::unique('cont__master_accounts')->ignore($id)
        ],
        [
            'cuenta.unique' => 'Esta cuenta ya ha sido registrada'
        ]);

        $account = Cont_MasterAccount::findOrFail($id);
        $account->fill($request->all());
        $account->save();

        return Redirect('/cont_maestroCuentas'); 
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
        try
        {
            Cont_MasterAccount::destroy($id);
            return redirect("/cont_maestroCuentas")->with([
                        "flash_message" => "Cuenta Eliminada con Éxito",
                        "flash_class" => "alert-success"
                    ]);
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            return redirect("/cont_maestroCuentas")->with([
                        "flash_message" => "No se pueden eliminar una Cuenta  con Registros Asociados.",
                        "flash_class" => "alert-danger"
                    ]);
        }
    }
}
