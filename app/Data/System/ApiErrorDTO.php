<?php

namespace App\Data\System;

/**
 * @OA\Schema(
 *      schema="ApiErrorDTO",
 *      @OA\Property(property="result", type="boolean", example=false),
 *      @OA\Property(property="message", type="string", example="Error ocurried")
 * )
 */
class ApiErrorDTO
{
    public bool $result;
    public string $message;

    public function __construct(bool $result = false, string $message) {
        $this->result = $result;
        $this->message = $message;
    }
}