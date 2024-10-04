<?php

namespace App\Data\System;

/**
 * @OA\Schema(
 *      schema="QueryValues",
 *      @OA\Property(property="recNo", type="integer", example=0),
 *      @OA\Property(
 *          property="record", 
 *          type="array",
 *          @OA\Items(ref="#/components/schemas/RecordValue")
 *      )
 * )
 */
class QueryValues
{
    public int $recNo;
    public array $record;

    public function __construct(int $recNo, array $record = []) {
        $this->recNo = $recNo;
        $this->record = $record;
    }
}