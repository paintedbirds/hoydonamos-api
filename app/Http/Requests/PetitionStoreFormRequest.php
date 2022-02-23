<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetitionStoreFormRequest extends FormRequest
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
            'subject' => 'required',
            'description' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'subject.required' => 'El Titulo es requerido',
            'description.required' => 'La descripción es requerida',
        ];
    }
}
