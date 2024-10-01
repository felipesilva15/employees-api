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
}
