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
    public string $value;

    public function __construct(string $value) {
        $this->value = $value;
    }
}