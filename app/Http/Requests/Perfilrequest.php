<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Perfilrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

          'correo_electronico_empresa' => 'nullable|email',
          'telefono_fijo_empresa'  => 'nullable|regex:/(55)[0-9]{8}/',

        ];
    }
    public function messages()
    {
        return [
            'telefono_fijo_empresa.regex' => 'Número de telefono es incorrecto ej: 5518943674',
            'correo_electronico_empresa.email' => 'Correo electronico invalido'

        ];
    }
}
