<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Utils
{
    public static $fieldTypes = [
        'int' => 3,
        'bigint' => 3,
        'smallint' => 3,
        'decimal' => 8,
        'varchar' => 9,
        'date' => 16,
        'timestamp' => 16
    ];

    public static function getFieldsDetailsFromView(string $objectName) {
        $columns = DB::select("
            SELECT
                COLUMN_NAME, 
                DATA_TYPE, 
                CHARACTER_MAXIMUM_LENGTH, 
                NUMERIC_SCALE 
            FROM information_schema.columns 
            WHERE 
                table_schema = DATABASE() 
                AND table_name = ?
        ", [$objectName]);

        $fields = [];

        foreach ($columns as $column) {
            $field = [
                'fieldName' => $column->COLUMN_NAME,
                'fieldType' => Utils::$fieldTypes[$column->DATA_TYPE] ?? 0,
                'fieldMask' => '',
                'fieldLength' => $column->CHARACTER_MAXIMUM_LENGTH ?? 0,
                'fieldDecimals' => $column->NUMERIC_SCALE ?? 0
            ];

            array_push($fields, $field);
        }

        return $fields;
    }

    public static function makeQueryResponse(array $fields, array $data): array {
        $values = [];
        $index = 0;

        foreach ($data as $item) {
            $record = [];

            foreach ($fields as $field) {
                array_push($record, [
                    "value" => $item[$field["fieldName"]]
                ]);
            }

            $value = [
                "recNo" => $index,
                "record" => $record
            ];

            array_push($values, $value);

            $index++;
        }

        $response = [
            "result" => true,
            "message" => [
                "fields" => $fields,
                "values" => $values
            ]
        ];

        return $response;
    } 

    public static function convertDate(string $date) {
        $dateSplited = explode('/', $date);

        return "{$dateSplited[2]}-{$dateSplited[1]}-{$dateSplited[0]}";
    }
}