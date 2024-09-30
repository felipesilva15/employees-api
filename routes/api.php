<?php

use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/enterprise', EnterpriseController::class);
Route::apiResource('/position', PositionController::class);
