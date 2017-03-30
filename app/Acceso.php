<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use App\Area;
use App\Sub_area;
use App\Departamentos;

class Acceso extends Model
{
    //
    protected $table = "acceso";

    protected $fillable = ['user_id', 'departamento_id', 'area_id', 'sub_area_id'];

//==========================Función para mostrar el menú ===============================================
    
    static function menu()
    {
        $acceso_total = Acceso::where('user_id','=', Auth::id())->get();
    	$menu = "";
        $areas = "";
        $depart = "";
        foreach ($acceso_total as $usuario_p) 
        {
            $areas = explode(',', $usuario_p->area_id); 
            
            $nombre_depart = Departamentos::where('id_departamento', '=', $usuario_p->departamento_id)->select('nombre', 'fa_class')->firstOrFail();

            $menu.='<li class="treeview">
                        <a href="#">
                            <i class="'.$nombre_depart->fa_class.'"></i>
                            <span>'.$nombre_depart->nombre.'</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a> 
                        <ul class="treeview-menu">'; 
                        foreach ($areas as $areas) 
                        {
                            $nombre_area = Area::where([
                                ['id_area','=' , $areas],
                                ['departamento_id', '=', $usuario_p->departamento_id]
                                ])->select('nombre')->firstOrFail();

                            $sub_area = Sub_area::where('area_id','=' ,$areas)->select('nombre','ruta')->get();
                            $menu.='
                            <li>
                              <a href="#">
                                <i class="fa fa-circle-o"></i>
                                <span>'.$nombre_area->nombre.'</span>
                                <i class="fa fa-angle-left pull-right"></i>
                              </a>
                              <ul class="treeview-menu">';
                                foreach ($sub_area as $sub_menu) 
                                {
                                    $menu.='
                                        <li><a href="'.route($sub_menu->ruta).'"><i class="fa fa-minus"></i>'.$sub_menu->nombre.'</a></li>';
                                }
                                    $menu.='
                                      </ul>
                                    </li>';
                                
                            
                        }
                        $menu.='
                        </ul>
                    </li>';
        }
        return $menu;
    }

}
