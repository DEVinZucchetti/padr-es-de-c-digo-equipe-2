<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVaccineRequest extends FormRequest
{
    protected $stopOnFirtsFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'professional_id' => 'required|integer',
            'pet_id' => 'required|integer',
            'dose' => 'required|numeric',
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'observations' => 'nullable|string',
            'date' => 'required|date',
        ];
    }
}
