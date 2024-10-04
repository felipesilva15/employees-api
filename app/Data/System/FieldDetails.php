<?php

namespace App\Data\System;

/**
 * @OA\Schema(
 *      schema="FieldDetails",
 *      @OA\Property(property="fieldName", type="string", example="Cpf"),
 *      @OA\Property(property="fieldType", type="integer", example=3),
 *      @OA\Property(property="fieldMask", type="string", example=""),
 *      @OA\Property(property="fieldLength", type="integer", example=11),
 *      @OA\Property(property="fieldDecimals", type="integer", example=0)
 * )
 */
class FieldDetails
{
    public string $fieldName;
    public int $fieldType;
    public string $fieldMask;
    public int $fieldLength;
    public int $fieldDecimals;

    public function __construct(string $fieldName, int $fieldType, string $fieldMask, int $fieldLength, int $fieldDecimals) {
        $this->fieldName = $fieldName;
        $this->fieldType = $fieldType;
        $this->fieldMask = $fieldMask;
        $this->fieldLength = $fieldLength;
        $this->fieldDecimals = $fieldDecimals;
    }
}