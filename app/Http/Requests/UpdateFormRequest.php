<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFormRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email:rfc,dns',
            'phone' => 'nullable|numeric',
            'about_me' => 'nullable|string',
            'image' => 'nullable|mimes:jpeg,bmp,png|max:1000',
        ];
    }
    public function messages()
    {
        return [
            // 'message' => 'Algo ha salido mal',
            'email.required' => 'El campo Email es requerido',
            'password.required' => 'El campo es requerido',
            'name.required' => 'El campo Nombre es requerido',
            'name.string' => 'Indique un nombre valido',
            'phone.numeric' => 'Por favor indique un número',
            'about_me.string' => 'Por favor indique solo texto',
            'image.image' => 'No se pudo subir la imagen',
            'image.max' => 'El máximo de la imagen es de 1Mb',
        ];
    }
}
