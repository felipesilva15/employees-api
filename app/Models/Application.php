<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @OA\Schema(
 *      schema="Application",
 *      required={"name", "client_id", "client_secret"},
 *      @OA\Property(property="name", type="string", example="App", minLength=2, maxLength=80),
 *      @OA\Property(property="client_id", type="string", example="XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX", minLength=24, maxLength=40),
 *      @OA\Property(property="client_secret", type="string", example="abcdefghijklmnopqrstuvwxyz123", minLength=10, maxLength=255),
 *      @OA\Property(property="created_at", type="string", format="date-time", example="2024-01-30T03:00:00.000000Z"),
 *      @OA\Property(property="updated_at", type="string", format="date-time", example="2024-01-30T03:00:00.000000Z")
 * )
 */
class Application extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'client_id',
        'client_secret'
    ];

    protected $hidden = [
        'client_secret'
    ];

    protected $casts = [
        'client_secret' => 'hashed'
    ];

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }

    public function getAuthPassword() {
        return $this->client_secret;
    }
}
