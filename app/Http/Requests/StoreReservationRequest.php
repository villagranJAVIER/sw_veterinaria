<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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
    //Validaciones de los campos para guardar citas
    public function rules()
    {
        return [
            'nombre' => 'required|max:255',
            'edad' => 'required|numeric',
            'peso' => 'required|numeric',
            'raza' => 'required|max:255',
            //'user_id' => 'required',
            'service_id' => 'required',
            
        ];
    }

    public function attributes(): array
    {
        return [
            'nombre' => 'nombre de mascota',
            'edad' => 'edad de mascota',
            'peso' => 'peso de mascota',
            'raza' => 'raza de mascota',
            //'user_id' => 'ID usuario',
            'service_id' => 'ID servicio',
            
        ];
    }
}
