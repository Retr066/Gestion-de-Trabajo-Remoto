<?php

namespace Database\Factories;

use App\Models\Informe;
use Illuminate\Database\Eloquent\Factories\Factory;

class InformeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Informe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'usuario_id'=> 1,
            'nombres'=> $this->faker->name,
            'nombre_area_informe'=>$this->faker->jobTitle,
            'fecha_inicio_realizadas'=>$this->faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
            'fecha_fin_realizadas'=>$this->faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
            'horas_total_realizadas'=>$this->faker->numberBetween($min = 10, $max = 100),
            'horas_total_planificadas'=>$this->faker->numberBetween($min = 10, $max = 100),
            'fecha_inicio_planificadas'=>$this->faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
            'fecha_fin_planificadas'=>$this->faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
        ];
    }
}
