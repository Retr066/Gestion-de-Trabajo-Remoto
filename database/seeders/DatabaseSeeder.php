<?php

namespace Database\Seeders;

use  App\Models\User;
use Illuminate\Database\Seeder;
use  App\Models\Area;

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
            'name' =>'vila',
            'email' => 'gey@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        Area::factory()->create([
            'user_id'=> $user->id,
            'nombre_area' => 'Progamacion',
        ]);


        Area::factory()->create([
            'user_id'=> $user2->id,
            'nombre_area' => 'mariconsismo',
        ]);

         $informe = Informe::factory()->create([
                'usuario_id' =>  $user->id,
            ]);
            $informe2 =  Informe::factory()->create([
                'usuario_id' =>  $user2->id,
            ]);




        InformesRealizadas::factory()->count(10)->create([
            'id_informe_realizadas' =>  $informe->id,
        ]);
        InformesRealizadas::factory()->count(10)->create([
            'id_informe_realizadas' =>  $informe2->id,
        ]);

        InformesPlanificadas::factory()->count(10)->create([
            'id_informe_planificadas' =>  $informe->id,
        ]);
        InformesPlanificadas::factory()->count(10)->create([
            'id_informe_planificadas' =>  $informe2->id,
        ]);



        Area::factory()->count(50)->create();

        /* Informe::factory()->count()->create(); */
        /* InformesRealizadas::factory()->count(50)->create();
        InformesPlanificadas::factory()->count(50)->create(); */

    }
}
