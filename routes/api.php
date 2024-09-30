<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/enterprise', EnterpriseController::class);
Route::apiResource('/position', PositionController::class);
Route::apiResource('/employee', EmployeeController::class);