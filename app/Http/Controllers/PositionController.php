<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function __construct(Position $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
    }
}
