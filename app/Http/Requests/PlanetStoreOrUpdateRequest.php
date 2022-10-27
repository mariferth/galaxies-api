<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanetStoreOrUpdateRequest extends FormRequest
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
            'number_of_moons' => ['required', 'numeric'],
            'light_years_from_the_main_star' => ['required', 'numeric']
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
            'number_of_moons.required' => 'O campo número de luas é obrigatório.',
            'number_of_moons.numeric' => 'O campo número de luas é inválido.',
            'light_years_from_the_main_star.required' => 'O campo anos-luz da estrela principal é obrigatório.',
            'light_years_from_the_main_star.numeric' => 'O campo anos-luz da estrela principal é inválido.'
        ];
    }
}
