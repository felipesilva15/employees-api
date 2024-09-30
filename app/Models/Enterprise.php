<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name'
    ];

    public static function rules(): array {
        return [
            'id' => 'required|string|max:4|unique:enterprises',
            'name' => 'required|string|max:40'
        ];
    }
}
