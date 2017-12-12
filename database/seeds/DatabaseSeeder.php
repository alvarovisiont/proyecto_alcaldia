<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //============================= Arrays de los faker =================================//
            //AREAS=========================
                
                $area = ['Departamentos'];
                
                $fa_class_area = ['fa fa-users'];

                $sub_area = ['crear_usuarios', 'administrar_usuarios','crear_usuarios', 'administrar_usuarios','crear_usuarios', 'administrar_usuarios'];
                $ruta_sub_area = ['usuarios.create', 'usuarios.index'];


        //***********************************************************************************
        
        // $this->call(UsersTableSeeder::class);
        $faker = Faker\Factory::create();

        App\Roles::create([
            'nombre' => 'Administrador',
            'descripcion' => 'Puede acceder a funciones que solo los programadores pueden'
        ]);

        App\Roles::create([
            'nombre' => 'Operador',
            'descripcion' => 'Usuario para otorgar a los trabajadores'
        ]);

        App\Roles::create([
            'nombre' => 'Programadores',
            'descripcion' => 'Programadores'
        ]);

        App\Roles::create([
            'nombre' => 'Con permisos',
            'descripcion' => 'Con permisos'
        ]);

        App\Roles::create([
            'nombre' => 'Restringidos',
            'descripcion' => 'Solo vistas'
        ]);

        for($i = 0; $i < 1; $i++) {
            App\Departamentos::create([
                'nombre' => 'Compras',
                'descripcion' => 'departamento de compras',
                'fa_class' => 'fa fa-home'
            ]);
        }

        for($i = 0; $i < 1; $i++) {
            App\Area::create([
                'departamento_id' => $i + 1,
                'nombre' => $area[$i],
            ]);
        }

        for($i = 0; $i < 2; $i++) {
            App\Sub_area::create([
                'area_id' => 1,
                'nombre' => $sub_area[$i],
                'descripcion' => 'control de usuarios',
                'ruta' => $ruta_sub_area[$i],
            ]);
        }

        for($i = 0; $i < 1; $i++) {
            App\Acceso::create([
                'user_id' => $i +1,
                'departamento_id' => 1,
                'area_id' => $i + 1,
                'sub_area_id' => $i +1,
            ]);
        }
        
        App\User::create([
            'nombres' => $faker->userName,
            'apellidos' => $faker->name,
            'nac' => 'V',
            'cedula' => '21202500',
            'telefono' => '04124362753',
            'rol_id' => 1,
            'departamento_id' => 1,
            'usuario' => 'admin',
            'password' => bcrypt('admin123')
        ]);
        
        App\User::create([
            'nombres' => 'Programador',
            'apellidos' => 'Programador',
            'nac' => 'V',
            'cedula' => '10000000',
            'telefono' => '00000000000',
            'rol_id' => 3,
            'departamento_id' => 1,
            'usuario' => 'programador',
            'password' => bcrypt('admin123')
        ]);

        App\Departamentos::create([
            'nombre' => 'Bienes',
            'descripcion' => 'Bienes',
            'fa_class' => 'fa fa-home'
        ]);
        App\Area::create(['departamento_id' => 2,'nombre' => 'Unidad']);
            App\Sub_area::create(['area_id' => 2, 'nombre'=>'Regristrar Unidad', 'descripcion' => 'Registrar unidad', 'ruta' => 'Bienes\unidades.create']);
            App\Sub_area::create(['area_id' => 2, 'nombre'=>'Ver unidades', 'descripcion' => 'Ver unidades', 'ruta' => 'Bienes\unidades.index']);

        App\Area::create(['departamento_id' => 2,'nombre' => 'Nomenclatura']);
            App\Sub_area::create(['area_id' => 3, 'nombre'=>'Ver Nomenclaturas', 'descripcion' => 'Ver Nomenclaturas', 'ruta' => 'Bienes\nomenclaturas.index']);
            App\Sub_area::create(['area_id' => 3, 'nombre'=>'Registrar Subgrupo', 'descripcion' => 'Registrar Subgrupo', 'ruta' => 'Bienes\nomenclaturas.createsub']);
            App\Sub_area::create(['area_id' => 3, 'nombre'=>'Registrar Subsubgrupo', 'descripcion' => 'Registrar Subsubgrupo', 'ruta' => 'Bienes\nomenclaturas.index']);

        App\Area::create(['departamento_id' => 2,'nombre' => 'Tipo_bien']);
            App\Sub_area::create(['area_id' => 4, 'nombre'=>'Ver Tipos', 'descripcion' => 'Ver Tipos', 'ruta' => 'Bienes\tipo_bien.index']);
            App\Sub_area::create(['area_id' => 4, 'nombre'=>'Registrar Tipo', 'descripcion' => 'Registrar Tipo', 'ruta' => 'Bienes\tipo_bien.create']);

        App\Area::create(['departamento_id' => 2,'nombre' => 'Conceptos']);
            App\Sub_area::create(['area_id' => 5, 'nombre'=>'Ver Conceptos', 'descripcion' => 'Ver Conceptos', 'ruta' => 'Bienes\conceptos.index']);
            App\Sub_area::create(['area_id' => 5, 'nombre'=>'Registrar Concepto', 'descripcion' => 'Registrar Concepto', 'ruta' => 'Bienes\conceptos.create']);
                
        App\Area::create(['departamento_id' => 2,'nombre' => 'Bien_Mueble']);
            App\Sub_area::create(['area_id' => 6, 'nombre'=>'Ver bienes', 'descripcion' => 'Ver bienes', 'ruta' => 'Bienes\bienes.index']);
            App\Sub_area::create(['area_id' => 6, 'nombre'=>'Registrar Bien', 'descripcion' => 'Registrar Bien', 'ruta' => 'Bienes\bienes.create']);

        
        App\Area::create(['departamento_id' => 2,'nombre' => 'Reportes']);
            App\Sub_area::create(['area_id' => 7, 'nombre'=>'BM-1', 'descripcion' => 'BM-1', 'ruta' => 'bienes\reportes.bm1']);
            App\Sub_area::create(['area_id' => 7, 'nombre'=>'BM-2', 'descripcion' => 'BM-2', 'ruta' => 'bienes\reportes.bm2']);
            App\Sub_area::create(['area_id' => 7, 'nombre'=>'BM-4', 'descripcion' => 'BM-4', 'ruta' => 'bienes\reportes.bm4']);
            App\Sub_area::create(['area_id' => 7, 'nombre'=>'Desincorporaciones', 'descripcion' => 'Desincorporaciones', 'ruta' => 'bienes\reportes.desincorporaciones']);
            App\Sub_area::create(['area_id' => 7, 'nombre'=>'Incorporaciones', 'descripcion' => 'Incorporaciones', 'ruta' => 'bienes\reportes.incorporaciones']);
            App\Sub_area::create(['area_id' => 7, 'nombre'=>'Total Unidad', 'descripcion' => 'Total Unidad', 'ruta' => 'bienes\reportes.unidades']);

    }
}
