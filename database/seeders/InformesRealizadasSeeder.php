<?php

namespace Database\Seeders;
use  App\Models\InformesRealizadas;
use Illuminate\Database\Seeder;

class InformesRealizadasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InformesRealizadas::factory()->count(10)->create();
    }
}
