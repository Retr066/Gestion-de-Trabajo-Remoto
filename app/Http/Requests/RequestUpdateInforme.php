<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdateInforme extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules($informe)
    {
        $values = [
            'usuario_id'=> 'required',
            'horas_total_realizadas' => 'required',
            'horas_total_planificadas' => 'required',
            'fecha_inicio_realizadas' => 'required',
            'fecha_fin_realizadas'=>'required',
            'fecha_inicio_planificadas' => 'required',
            'fecha_fin_planificadas' => 'required',
        ];

        return $values;
    }
}
