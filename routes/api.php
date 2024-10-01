<?php

use App\Enums\TypeMappingEnum;
use App\Helpers\Utils;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\QueryController;
use App\Models\Employee;
use App\Models\EmployeeView;
use App\Models\Enterprise;
use Illuminate\Support\Facades\Route;

Route::apiResource('/enterprise', EnterpriseController::class);
Route::apiResource('/position', PositionController::class);
Route::apiResource('/employee', EmployeeController::class);
Route::post('/REST/API.APDATA.V1/QUERYS', [QueryController::class, 'index']);