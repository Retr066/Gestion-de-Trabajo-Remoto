<?php

namespace Database\Factories;

use App\Models\InformesRealizadas;
use Illuminate\Database\Eloquent\Factories\Factory;

class InformesRealizadasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InformesRealizadas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_informe_realizadas'=> 1,
            'nombre_rubro_realizadas'=> $this->faker->jobTitle,
            'descripcion_rubro_realizadas'=>$this->faker->sentence,
            'horas_solas_realizadas'=>$this->faker->numberBetween($min = 10, $max = 100),


        ];
    }
}
