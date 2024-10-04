<?php

namespace App\Data\System;

/**
 * @OA\Schema(
 *      schema="QueryMessage",
 *      @OA\Property(
 *          property="fields", 
 *          type="array",
 *          @OA\Items(ref="#/components/schemas/FieldDetails")
 *      ),
 *      @OA\Property(
 *          property="values", 
 *          type="array",
 *          @OA\Items(ref="#/components/schemas/QueryValues")
 *      )
 * )
 */
class QueryMessage
{
    public array $fields;
    public array $values;

    public function __construct(array $fields, array $values = []) {
        $this->fields = $fields;
        $this->values = $values;
    }
}