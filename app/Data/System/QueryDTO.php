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
    public QueryMessage $message;

    public function __construct(bool $result = true, QueryMessage $message) {
        $this->result = $result;
        $this->message = $message;
    }
}