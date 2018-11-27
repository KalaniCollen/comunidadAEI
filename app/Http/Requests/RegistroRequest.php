<?php

namespace ComunidadAEI\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Registrorequest extends FormRequest
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

          'password' => 'string|min:6|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'password.min' => 'La contraseña debe contener minimo 6 caracteres',
            'password.confirmed' =>'Las contraseñas no coinciden'
        ];
    }
}
