<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\validation\Rule;

class ValidarLugarRequest extends FormRequest
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
            'imagen'=>'image|mimes:jpeg,png,jpg|max:2048',
            'ubicacion'=>'required|string|max:255',
            'mapa'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'departamento'=>'required|string|max:50',
            'provincia'=>'required|string|max:50',
            'distrito'=>'required|string|max:50',
            'nombre'=>['max:255','required',
            Rule::unique('lugares_turisticos')->ignore($this->route('lugare'))],
        ];
    }
}
