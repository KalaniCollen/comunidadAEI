<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class passwordRequest extends FormRequest
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
            'mypassword' => 'required',
            'password' => 'required|string|min:6|confirmed',

        ];
    }
    public function messages()
    {
        return [

            'mypassword.required' => 'Contraseña obligatoria',
            'password.required' => 'Campo obligatorio',
            'password.min' => 'Contraseña corta, deben ser minimo 6 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden'
        ];
    }
}
