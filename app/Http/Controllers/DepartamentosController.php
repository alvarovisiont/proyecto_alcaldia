<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamentos;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$departamentos = Departamentos::all();
      return view("departamentos.index",['departamentos'=>$departamentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view("departamentos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $departamento = new Departamentos;

      $departamento->fill($request->all());

      if($departamento->save()){
        return redirect('/departamentos')->with([
	        'flash_message' => 'Departamento agregado.',
	        'flash_class' => 'alert-success'
        ]);
      }else{
        return view("departamentos.create",[
	        	"departamento" => $departamento,
		        "flash_message" => "Ah ocurrido un error.",
		        "flash_class" => "alert-danger"
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
    	$departamentos = Departamentos::findOrFail($id);
    	$area = $departamentos->areas();
    	$areas = (object)["areas"=>$area,"count"=>$area->count(),'users'=>$departamentos->users()];


      return view('departamentos.view',['departamento'=>$departamentos,'areas'=>$areas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$departamentos = Departamentos::findOrFail($id);
      return view('departamentos.edit',['departamento'=>$departamentos]);
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
      $departamento = Departamentos::findOrFail($id);

      $departamento->fill($request->all());

      if($departamento->save()){
        return redirect("/departamentos/{$id}")->with(["flash_message"=>"Cambios guardados con exito.","flash_class"=>"alert-success"]);
      }else{
        return view("departamentos.edit", [
        						"departamento" => $departamento,
        						"flash_message" => "Ha ocurrido un error.",
        						"flash_class" => "alert-danger"
        					]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $departamentos = Departamentos::find($id);
      if($departamentos){
	    	if($departamentos->areas()->count() > 0 || $departamentos->users() > 0){
	    		return redirect("/departamentos/{$id}")->with([
		        						"flash_message" => "No se pueden eliminar departamentos con asignaciones.",
		        						"flash_class" => "alert-danger"
	        						]);
	    	}else{
	    		return redirect('/departamentos')->with([
	        						"flash_message" => "Departamento eliminado.",
	        						"flash_class" => "alert-success"
	        					]);
	    	}
	    }else{
    		return redirect('/departamentos')->with([
        						"flash_message"=>"Departamento no encontrado.",
        						"flash_class" => "alert-danger"
        					]);
	    }
    }//Destroy
}
