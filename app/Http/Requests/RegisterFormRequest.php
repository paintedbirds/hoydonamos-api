<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required'
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
            // 'message' => 'Algo ha salido mal',
            'email.unique' => 'Este Email ya existe',
            'email.required' => 'El campo Email es requerido',
            'email.email' => 'Ingrese un Email valido',
            'name.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
        ];
    }
    
}
