<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct(Employee $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
    }
}
