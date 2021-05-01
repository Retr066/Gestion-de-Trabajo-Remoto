<?php

namespace Database\Seeders;
use  App\Models\InformesPlanificadas;
use Illuminate\Database\Seeder;

class InformesPlanificadasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InformesPlanificadas::factory()->count(10)->create();
    }
}
