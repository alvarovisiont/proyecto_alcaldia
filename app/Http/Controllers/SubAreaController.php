<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sub_area;
use App\Area;

class SubAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$sub_area = Sub_area::all();
        //Listar relaciones con foreach EagerLoading
        $sub_area = Sub_area::with('areas')->get();
        //dd($area = $sub_area->areas());

        return view('sub_area.index',['sub_area' => $sub_area]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $area = Area::with('departamentos')->get();

        return view('sub_area.create',['areas' => $area]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [

            'nombre' => 'required',
            'descripcion' => 'required|max:220',

            ]);

        //dd($request->all());
        $sub_area = new Sub_Area;
        $sub_area = $sub_area->fill($request->all());
        if($sub_area->save())
        {
            $with = [
            'flash_message' => 'Se registro l sub_area correctamente!',
            'flash_class' => 'alert-success'];

        }else{
            $with = [
            'flash_message' => 'Ha ocurrido un error.',
            'flash_class' => 'alert-danger',
            'alert-important' => true
            ];
        }
        //dd($with);
        return redirect('/sub_area')->with($with);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub_area = Sub_area::with('areas')->where('id_sub_area',$id)->get()->first();

        return view('sub_area.ver',['sub' => $sub_area]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_area = Sub_area::with('areas')->where('id_sub_area',$id)->get()->first();
        $area = Area::with('departamentos')->get();
        $areas = Area::all();

        return view('sub_area.modificar',['sub' => $sub_area,'areas' => $areas,'area' => $area]);

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
        //dd($request->all());
        $sub_area = Sub_area::findOrFail($id);
        $sub_area->fill($request->all());
        if($sub_area->save())
        {
            $with = [
            'flash_message' => 'Se modifico la sub_area correctamente!',
            'flash_class' => 'alert-success'];

        }else{
            $with = [
            'flash_message' => 'Ha ocurrido un error.',
            'flash_class' => 'alert-danger',
            'alert-important' => true
            ];
        }
        //dd($with);
        return redirect()->route('sub_area.index')->with($with);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_area = Sub_area::findOrFail($id);
        $areas = $sub_area->areas()->count();
        if($areas > 0)
        {
            $with = [
            'flash_message' => 'Esta sub_area esta asociada a un AREA , no se puede eliminar!',
            'flash_class' => 'alert-danger'];
        }else{

            if($sub_area->destroy($id))
            {
                $with = [
                'flash_message' => 'Se Elimino correctamente!',
                'flash_class' => 'alert-danger'];
            }else{
                $with = [
                'flash_message' => 'Ocurrio un error inesperado!',
                'flash_class' => 'alert-danger'];
            }
            
        }
        return redirect()->route('sub_area.index')->with($with);
        
        
    }
}
