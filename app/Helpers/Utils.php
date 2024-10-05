<?php

namespace App\Helpers;

use App\Data\System\FieldDetails;
use App\Data\System\QueryDTO;
use App\Data\System\QueryMessage;
use App\Data\System\QueryValues;
use App\Data\System\RecordValue;
use Illuminate\Support\Facades\DB;

class Utils
{
    public static array $fieldTypes = [
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
                COALESCE(CHARACTER_MAXIMUM_LENGTH, NUMERIC_PRECISION) AS FIELD_LENGTH, 
                NUMERIC_SCALE 
            FROM information_schema.columns 
            WHERE 
                table_schema = DATABASE() 
                AND table_name = ?
        ", [$objectName]);

        $fields = [];

        foreach ($columns as $column) {
            $field = new FieldDetails(
                $column->COLUMN_NAME,
                Utils::$fieldTypes[$column->DATA_TYPE] ?? 0,
                '',
                $column->FIELD_LENGTH ?? 0,
                $column->NUMERIC_SCALE ?? 0
            );

            array_push($fields, $field);
        }

        return $fields;
    }

    public static function makeQueryResponse(array $fields, array $data): QueryDTO {
        $index = 0;
        $values = [];

        foreach ($data as $item) {
            $record = [];

            foreach ($fields as $field) {
                $value = Utils::treatQueryValue($field, $item[$field->fieldName]);

                array_push($record, new RecordValue($value));
            }

            $value = new QueryValues($index, $record);
            array_push($values, $value);

            $index++;
        }

        $message = new QueryMessage($fields, $values);
        $response = new QueryDTO(true, $message);

        return $response;
    } 

    public static function treatQueryValue(FieldDetails $fieldDetails, mixed $value): string {
        if (is_null($value)) {
            return "";
        }

        if ($fieldDetails->fieldType == Utils::$fieldTypes["decimal"]) {
            $value = str_replace(".", ",", $value);
        }

        $value = Utils::checkAndSetMask($fieldDetails->fieldName, $value);

        return $value;
    }

    public static function convertDate(string $date) {
        $dateSplited = explode('/', $date);

        return "{$dateSplited[2]}-{$dateSplited[1]}-{$dateSplited[0]}";
    }

    public static function checkAndSetMask(string $fieldName, mixed $value): mixed {
        switch (strtolower($fieldName)) {
            case 'cpf':
                $value = Mask::Cpf($value);
                break;

            case 'nr_rg':
                $value = Mask::Rg($value);
                break;
        }

        return $value;
    }
}