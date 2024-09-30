<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'registration_number',
        'gender',
        'cpts_number',
        'cpts_serial',
        'cpts_uf',
        'cpts_date',
        'admission_date',
        'dismissal_date',
        'cost_center',
        'capacity_unit',
        'salary',
        'rg',
        'position_id',
        'enterprise_id'
    ];

    public static function rules(): array {
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
