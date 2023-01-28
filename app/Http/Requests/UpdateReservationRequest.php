<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationRequest extends FormRequest
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
    public function rules()
    {
        return [
            'nombre_c' => 'required|max:255',
            'nombre_a' => 'required|max:255',
            'edad_a' => 'required|numeric',
            'peso_a' => 'required|numeric',
            'raza_a' => 'required|max:255',
            'service_id' => 'required',
            //'user_id' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'nombre_c' => 'nombre de cliente',
            'nombre_a' => 'nombre de mascota',
            'edad_a' => 'edad de mascota',
            'peso_a' => 'peso de mascota',
            'raza_a' => 'raza de mascota',
            'service_id' => 'ID servicio',
            //'user_id' => 'ID usuario',
        ];
    }
}
