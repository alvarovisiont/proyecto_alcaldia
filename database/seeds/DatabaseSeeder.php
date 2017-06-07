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
                $ruta_sub_area = ['usuario.create', 'usuario.index'];


        //***********************************************************************************
        
        // $this->call(UsersTableSeeder::class);
        $faker = Faker\Factory::create();

        for($i = 0; $i < 1; $i++) {
            App\Roles::create([
                'nombre' => 'Servicio tecnico',
                'descripcion' => 'servicio',
               
            ]);
        }



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

        for($i = 0; $i < 1; $i++) {
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
        }

    }
}
