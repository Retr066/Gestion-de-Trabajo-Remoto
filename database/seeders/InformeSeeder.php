<?php

namespace Database\Seeders;
use  App\Models\Informe;
use Illuminate\Database\Seeder;

class InformeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Informe::factory()->count(20)->create();
    }
}
