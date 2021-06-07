<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdateRubro extends FormRequest
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
    public function rules()
    {
        return [
            'nombre_rubro'=> 'required|min:3|max:30|regex:/^[A-Z,a-z][A-Z,a-z, ]+$/',
        ];

        return $values;
    }

    public function messages()
    {
        return[
            //RESTRICCION NOMBRE
            'nombre_rubro.required' => 'El campo nombre es obligatorio.',
            'nombre_rubro.min' => 'El campo nombre debe contener al menos 3 caracteres',
            'nombre_rubro.regex' => 'El campo nombre solo acepta letras.',
        ];
    }
}
