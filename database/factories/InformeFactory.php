<?php

namespace Database\Factories;
use App\Models\User;
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
                'usuario_id' => function(){
                return User::factory()->create()->id;
            },
            /* 'nombres'=> function(){
                return User::factory()->create()->name;
            },
            'nombre_area_informe'=>function(){
                return User::factory()->create()->r_area->nombre_area;
            }, */
            'estado' => $this->faker->randomElement(['generado','enviado_jefatura','aprovado_jefatura','rechazado_jefatura','enviado_recursos','archivado']),
            'respuesta'=>$this->faker->sentence,
            'fecha_inicio_realizadas'=>$this->faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
            'fecha_fin_realizadas'=>$this->faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
            'horas_total_realizadas'=>$this->faker->numberBetween($min = 10, $max = 100),
            'horas_total_planificadas'=>$this->faker->numberBetween($min = 10, $max = 100),
            'fecha_inicio_planificadas'=>$this->faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
            'fecha_fin_planificadas'=>$this->faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
        ];
    }
}
