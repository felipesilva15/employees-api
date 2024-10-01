<?php

use App\Enums\TypeMappingEnum;
use App\Helpers\Utils;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\PositionController;
use App\Models\Employee;
use App\Models\EmployeeView;
use App\Models\Enterprise;
use Illuminate\Support\Facades\Route;

Route::apiResource('/enterprise', EnterpriseController::class);
Route::apiResource('/position', PositionController::class);
Route::apiResource('/employee', EmployeeController::class);

Route::get('/test', function() {
    $model = new EmployeeView();
    $data = $model::all()->toArray();

    $fields = Utils::getFieldsDetailsFromView($model->getTable());
    $values = [];
    $index = 0;

    foreach ($data as $employee) {
        $record = [];

        foreach ($fields as $field) {
            array_push($record, [
                "value" => $employee[$field["fieldName"]]
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

    return response()->json($response, 200);
});