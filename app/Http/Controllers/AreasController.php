<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamentos;
use App\Area;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$areas = Area::with('departamentos')->get();
      return view("areas.index",['areas'=>$areas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$dep  = Departamentos::all();
      return view("areas.create",["departamentos"=>$dep]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $area = new Area;

      $area->fill($request->all());

      if($area->save()){
      	return redirect('/areas')->with(['flash_message'=>'Area agregada.','flash_class'=>'alert-success']);
      }else{
        return view("departamentos.create",[
	        	"area" => $area,
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
      $area = Area::findOrFail($id);
    	$subAreas = $area->subAreas();
    	$sub = (object)["subareas"=>$subAreas,"count"=>$subAreas->count()];
    	//dd($sub);

      return view('areas.view',['area'=>$area,'subareas'=>$sub]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $area = Area::findOrFail($id);
       $dep  = Departamentos::all();

       return view("areas.edit",['area'=>$area,'departamentos'=>$dep]);
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
        
      $area = Area::findOrFail($id);

      $area->fill($request->all());

      if($area->save()){
        return redirect("/areas/{$id}")->with(["flash_message"=>"Cambios guardados con exito.","flash_class"=>"alert-success"]);
      }else{
        return view("areas.edit", [
        						"area" => $area,
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
      $area = Area::find($id);
      if($area){
	    	if($area->subAreas()->count() > 0){
	    		return redirect("/areas/{$id}")->with([
		        						"flash_message" => "No se pueden eliminar areas con asignaciones.",
		        						"flash_class" => "alert-danger"
	        						]);
	    	}else{
	    		return redirect('/areas')->with([
	        						"flash_message" => "Area eliminada.",
	        						"flash_class" => "alert-success"
	        					]);
	    	}
	    }else{
    		return redirect('/areas')->with([
        						"flash_message"=>"Area no encontrada.",
        						"flash_class" => "alert-danger"
        					]);
	    }
    }
}
