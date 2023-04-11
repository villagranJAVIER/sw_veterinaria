<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    //Validaciones de los campos para guardar servicios
    public function rules()
    {
        return [
            'nombre' => 'required|max:255|unique:Services',
            'precio' => 'required|numeric',
            'imagen' => ['mimes:jpg,png,bmp,gif,tif,jpeg'],
        ];
    }

    public function attributes(): array
    {
        return [
            'nombre' => 'nombre',
            'precio' => 'precio',
            'imagen' => 'imagen'
        ];
    }
}
