<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateServiceRequest extends FormRequest
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
            'nombre' => ['required','max:255',Rule::unique('Services')->ignore($this->id)],
            'precio' => 'required|numeric',
        ];
    }
    public function attributes(): array
    {
        return [
            'nombre' => 'nombre',
            'precio' => 'precio',
        ];
    }
}
