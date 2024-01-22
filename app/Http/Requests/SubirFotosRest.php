<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubirFotosRest extends FormRequest
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
            'fotos' => 'required|array',
            'fotos.*' => 'required|image|mimes:jpeg,png,jpg|max:3000',
            'id' => 'required|numeric|exists:restaurantes,id',
        ];
    }
}
