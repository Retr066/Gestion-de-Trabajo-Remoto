<?php

namespace Database\Factories;
use  App\Models\Informe;
use App\Models\InformesPlanificadas;
use Illuminate\Database\Eloquent\Factories\Factory;

class InformesPlanificadasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InformesPlanificadas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_informe_planificadas'=>  function(){
                return Informe::factory()->create()->id;
            },
            'nombre_rubro_planificadas'=> $this->faker->jobTitle,
            'descripcion_rubro_planificadas'=>$this->faker->sentence,
            'horas_solas_planificas'=>$this->faker->numberBetween($min = 10, $max = 100),
        ];
    }
}
