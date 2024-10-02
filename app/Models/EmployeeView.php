<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeView extends Model
{
    use HasFactory;

    protected $table = 'employees_view';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
    
    protected $casts = [
        "Vl_salario" => "double"
    ];
}
