<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use  App\Models\User;
use Illuminate\Database\Seeder;
use  App\Models\Area;
use  App\Models\Rubro;

use  App\Models\InformesRealizadas;
use  App\Models\InformesPlanificadas;
use  App\Models\Informe;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
       $user = User::create([
            'name' =>'Jherson',
            'email' => 'jherson@gmail.com',

            'password' => bcrypt('12345'),
        ]);
        $user2 =  User::create([
            'name' =>'Jhonatan',
            'email' => 'jhonatan@gmail.com',

            'password' => bcrypt('12345'),
        ]);
        $user3 = User::create([
            'name' =>'Sulca',
            'email' => 'Sulca@gmail.com',

            'password' => bcrypt('12345'),
        ]);

        Area::factory()->create([
            'user_id'=> $user->id,
            'nombre_area' => 'Ingenieria de Sistemas',
        ]);


        Area::factory()->create([
            'user_id'=> $user2->id,
            'nombre_area' => 'Ingenieria de Sistemas',
        ]);

        Area::factory()->create([
            'user_id'=> $user3->id,
            'nombre_area' => 'Ingenieria de Sistemas',
        ]);

         $informe = Informe::factory()->create([
                'usuario_id' =>  $user->id,
                /* 'nombres' => $user->name,
                'nombre_area_informe'=>$user->r_area->nombre_area, */
            ]);
            $informe2 =  Informe::factory()->create([
                'usuario_id' =>  $user2->id,
                /* 'nombres' => $user2->name,
                'nombre_area_informe'=>$user2->r_area->nombre_area, */
            ]);
            $informe3 = Informe::factory()->create([
                'usuario_id' =>  $user->id,
                /* 'nombres' => $user->name,
                'nombre_area_informe'=>$user->r_area->nombre_area, */
            ]);




        InformesRealizadas::factory()->count(5)->create([
            'id_informe_realizadas' =>  $informe->id,
        ]);
        InformesRealizadas::factory()->count(5)->create([
            'id_informe_realizadas' =>  $informe2->id,
        ]);
        InformesRealizadas::factory()->count(5)->create([
            'id_informe_realizadas' =>  $informe3->id,
        ]);

        InformesPlanificadas::factory()->count(5)->create([
            'id_informe_planificadas' =>  $informe->id,
        ]);
        InformesPlanificadas::factory()->count(5)->create([
            'id_informe_planificadas' =>  $informe2->id,
        ]);
        InformesPlanificadas::factory()->count(5)->create([
            'id_informe_planificadas' =>  $informe3->id,
        ]);



        Area::factory()->count(50)->create();

        $admin = Role::create(['name' => 'SuperUsuario']);
        $docente = Role::create(['name' => 'Docente']);
        $jefatura = Role::create(['name' => 'Jefatura']);
        $administracion = Role::create(['name' => 'Administracion']);
        $role = Role::create(['name' => 'role']);

        $permission = [
            'create',
            'read',
            'update',
            'delete',
        ];

        foreach(Role::all() as $role){
            foreach($permission as $p){
                if($role->name == 'SuperUsuario') $role->name = 'usuario';
                Permission::create(['name' => "{$role->name} $p"]);
            }
        }

        $admin->syncPermissions(Permission::all());
        $docente->syncPermissions(Permission::where('name','like','%Docente%')->get());
        $jefatura->syncPermissions(Permission::where('name','like','%Jefatura%')->get());
        $administracion->syncPermissions(Permission::where('name','like','%Administracion%')->get());
        $role->syncPermissions(Permission::where('name','like','%role%')->get());


        $user->assignRole('SuperUsuario');
        $user2->assignRole('SuperUsuario');
        $user3->assignRole('Docente');

        /* Informe::factory()->count()->create(); */
        /* InformesRealizadas::factory()->count(50)->create();
        InformesPlanificadas::factory()->count(50)->create(); */

//RUBROS

$rubro = new Rubro();

$rubro->nombre_rubro = "Capacitacion";

$rubro->save();

$rubro2 = new Rubro();

$rubro2->nombre_rubro = "Dictado de clases";

$rubro2->save();

$rubro3 = new Rubro();

$rubro3->nombre_rubro = "Conferencias";

$rubro3->save();

$rubro4 = new Rubro();

$rubro4->nombre_rubro = "Asesorias";

$rubro4->save();

Rubro::factory()->count(50)->create();

    }
}
