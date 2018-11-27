<?php

namespace ComunidadAEI\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvitadoRequest extends FormRequest
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
            'nombre_invitado' => 'required|string',
            'apellido_invitado' => 'required|string',
            'correo_invitado' => 'required|email',
            'edad_invitado'  => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nombre_invitado.required' => 'No puedes dejar este campo vacio',
            'apellido_invitado.required' => 'No puedes dejar este campo vacio',
            'correo_invitado.email' => 'Correo electronico invalido',
            'edad_invitado.required' => 'No pudes dejar este campo vacio'
        ];
    }
}
