<?php

namespace App\bienes;

use Illuminate\Database\Eloquent\Model;

class Nomenclatura extends Model
{
  	protected $table = "bienes_nomenclatura";

    protected $fillable = ['grupo', 'sub_grupo', 'sub_sub_grupo','descripcion','tipo'];

    public function last_subgrupo($grupo){
    	return ($this->where([['grupo',$grupo],['tipo',1]])->max('sub_grupo'))+1;
    }

    public function getSubgrupos($grupo){
    	return $this->select('id','sub_grupo','descripcion')->where([['grupo',$grupo],['tipo',1]])->get();
    }


    public function getSubgrupos2($grupo,$subgrupo){
        return $this->select('id','descripcion')->where([['grupo',$grupo],['sub_grupo',$subgrupo],['tipo',2]])->get();
    }

    public function last_subsubgrupo($grupo){
    	return ($this->where([['grupo',$grupo],['tipo',2]])->max('sub_sub_grupo'))+1;
    }

    public function getSubgrupoID($grupo,$subgrupo){
        $sub = $this->select('id')->where([['grupo',$grupo],['sub_grupo',$subgrupo],['sub_sub_grupo',0],['tipo',1]])->first();
        return $sub->id;
    }

    public function getParentDescripcion(){
        $subgrupo = $this->find($this->getSubgrupoID($this->grupo,$this->sub_grupo));
        return $subgrupo->descripcion;
    }

    public function getTipoBienes(){
        return $this->hasMany('App\Bienes\Tipo_bien','nomenclatura_id')->select('id','descripcion')->get();
    }
}
