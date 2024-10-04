<?php

namespace App\Data\System;

/**
 * @OA\Schema(
 *      schema="QueryDTO",
 *      @OA\Property(property="result", type="boolean", example=true),
 *      @OA\Property(property="message", ref="#/components/schemas/QueryMessage")
 * )
 */
class QueryDTO
{
    public bool $result;
    public object $message;

    public function __construct(bool $result = true, string $message) {
        $this->result = $result;
        $this->message = $message;
    }
}