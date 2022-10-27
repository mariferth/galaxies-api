<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalaxyStoreOrUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100'],
            'dimension' => ['required', 'numeric'],
            'number_of_solar_systems' => ['required', 'numeric']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser uma string.',
            'dimension.required' => 'O campo dimensão é obrigatório.',
            'dimension.numeric' => 'O campo dimensão é inválido.',
            'number_of_solar_systems.required' => 'O campo número de sistemas solares é obrigatório.',
            'number_of_solar_systems.numeric' => 'O campo número de sistemas solares é inválido.'
        ];
    }
}
