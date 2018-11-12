<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CorreoRequest extends FormRequest
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
            //
            // 'email' =>'required|email|unique:users,email,'.$user->id . ',id_usuario',
'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::id(), 'id_usuario')]
        ];
    }
    public function messages()
    {
        return [

            'email.email' => 'Correo electronico invalido',
            'email.required' => 'Correo electronico es obligatorio',
            'email.unique' => 'Ya esta registrado este correo electronico'
        ];
    }
}
