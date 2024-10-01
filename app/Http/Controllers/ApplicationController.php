<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function __construct(Application $model, Request $request) {
        $this->model = $model;
        $this->request = $request;
    }
}
