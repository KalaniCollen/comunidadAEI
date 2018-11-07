<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductosRequest extends FormRequest
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
            'nombre' => 'required',
            'imagen' => 'image',
            'costo' => 'required|numeric|min:0',
            'descripcion' => 'required',
            'tipo' => 'required',
            'descuento' => 'required|numeric|min:0|max:100',

        ];
    }
}
