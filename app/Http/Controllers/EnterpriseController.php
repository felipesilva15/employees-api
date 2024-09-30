<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use Illuminate\Http\Request;

class EnterpriseController extends Controller
{
    public function __construct(Enterprise $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
    }
}
