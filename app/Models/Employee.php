<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Employee",
 *      required={"name", "cpf", "registration_number", "gender", "admission_date", "cost_center", "capacity_unit", "salary", "rg", "position_id", "enterprise_id"},
 *      @OA\Property(property="id", type="integer", example=1),
 *      @OA\Property(property="name", type="string", example="Anderson Nunes", maxLength=70),
 *      @OA\Property(property="cpf", type="string", example="05645221045", minLength=11, maxLength=11),
 *      @OA\Property(property="registration_number", type="string", example="35468598", maxLength=100),
 *      @OA\Property(property="gender", type="integer", example=1, maximum=2),
 *      @OA\Property(property="cpts_number", type="string", example="818232", maxLength=100),
 *      @OA\Property(property="cpts_serial", type="string", example="8847", maxLength=60),
 *      @OA\Property(property="cpts_uf", type="string", example="SP", maxLength=2),
 *      @OA\Property(property="cpts_date", type="string", format="date", example="2022-01-01"),
 *      @OA\Property(property="admission_date", type="string", format="date", example="2022-01-01"),
 *      @OA\Property(property="dismissal_date", type="string", format="date", example=null),
 *      @OA\Property(property="cost_center", type="integer", example=1),
 *      @OA\Property(property="capacity_unit", type="string", example="411405040101", maxLength=12),
 *      @OA\Property(property="salary", type="number", format="float", example=2015.90),
 *      @OA\Property(property="rg", type="string", example="55698546X", maxLength=9),
 *      @OA\Property(property="position_id", type="integer", example=1),
 *      @OA\Property(property="enterprise_id", type="integer", example=1),
 *      @OA\Property(property="created_at", type="string", format="date-time", example="2024-01-30T03:00:00.000000Z"),
 *      @OA\Property(property="updated_at", type="string", format="date-time", example="2024-01-30T03:00:00.000000Z")
 * )
 */
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
    
    protected $casts = [
        'salary' => 'double'
    ];
}
