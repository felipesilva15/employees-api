<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\QueryController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/enterprise', EnterpriseController::class);
Route::apiResource('/position', PositionController::class);
Route::apiResource('/employee', EmployeeController::class);
Route::apiResource('/application', ApplicationController::class);

Route::get('/REST/API.APDATA.V1/AUTH', [AuthController::class, 'authentication']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/REST/API.APDATA.V1/QUERYS', [QueryController::class, 'index']);
});