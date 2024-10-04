<?php

namespace App\Data\System;

/**
 * @OA\Schema(
 *      schema="RecordValue",
 *      @OA\Property(
 *          property="value",
 *          anyOf={
 *              @OA\Schema(type="string"),
 *              @OA\Schema(type="integer")
 *          }
 *     )
 * )
 */
class RecordValue
{
    public mixed $value;

    public function __construct(mixed $value) {
        $this->value = $value;
    }
}