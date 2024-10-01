<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:70',
            'cpf' => 'required|string|min:11|max:11',
            'registration_number' => 'required|string|max:100',
            'gender' => 'required|int|max:2',
            'cpts_number' => 'string|max:100',
            'cpts_serial' => 'string|max:60',
            'cpts_uf' => 'string|max:2',
            'cpts_date' => 'date',
            'admission_date' => 'required|date',
            'dismissal_date' => 'date',
            'cost_center' => 'required|int',
            'capacity_unit' => 'required|string|max:12',
            'salary' => 'required|decimal:0,2',
            'rg' => 'required|string|min:9|max:9',
            'position_id' => 'required|string|max:20',
            'enterprise_id' => 'required|string|max:4'
        ];
    }
}
