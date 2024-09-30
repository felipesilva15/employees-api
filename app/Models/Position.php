<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name'
    ];

    public static function rules(): array {
        return [
            'id' => 'required|string|max:20|unique:positions',
            'name' => 'required|string|max:80'
        ];
    }
}
