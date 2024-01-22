<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarRestauranteRequest extends FormRequest
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
            'imagen'=>'image|mimes:jpeg,png,jpg|max:2048',
            'descripcion'=>'string|max:255|required',
            'nombre'=>'string|max:150|required',
            'ruc'=>['max:255','required',
            Rule::unique('restaurantes')->ignore($this->route('restaurante'))],
        ];
    }
}
