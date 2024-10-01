<?php

namespace App\Http\Controllers;

use App\Exceptions\MasterNotFoundHttpException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    protected $model;
    protected $request;
    protected $dto;

    public function index() {
        $query = $this->model::query();
        $filters = $this->request->all();

        // Filtros extras além do fillable
        $othersFillableFields = [];

        // Filtra todos os campos que estão na propriedade fillable da model
        foreach ($filters as $field => $value) {
            if (in_array($field, $this->model->getFillable()) || in_array($field, $othersFillableFields)) {
                if (method_exists($this->model, 'rules')){
                    if ($this->model::rules()[$field] && str_contains($this->model::rules()[$field], 'string')) {
                        $query->where($field, 'like', '%'.trim($value).'%');
                        continue;
                    }
                }

                $query->where($field, $value);
            }
        }

        $query->orderBy('id', 'desc');

        $data = $query->get();

        return response()->json($data, 200);
    }

    public function show($id) {
        $data = $this->model::find($id);

        if (!$data) {
            throw new MasterNotFoundHttpException();
        }

        if($this->dto && method_exists($this->dto, 'fromModel')) {
            $data = $this->dto::fromModel($data);
        }
        
        return response()->json($data, 200);
    }

    public function store(Request $request) {
        $requestData = $this->validateRequest($request);
        
        $data = $this->model::create($requestData);

        return response()->json($data, 201);
    }

    public function update(Request $request, $id) {
        $data = $this->model::find($id);

        if (!$data) {
            throw new MasterNotFoundHttpException;
        }

        $requestData = $this->validateRequest($request);
        
        $data->update($requestData);

        return response()->json($data, 200);
    }

    public function destroy($id) {
        $data = $this->model::find($id);

        if (!$data) {
            throw new MasterNotFoundHttpException;
        }

        $data->delete();

        return response()->json(['message' => 'Registro deletado com sucesso!'], 200);
    }

    protected function validateRequest(Request $request): mixed {
        $formRequestClass = $this->getFormRequestClass();

        if (class_exists($formRequestClass)) {
            $formRequest = app($formRequestClass);
            $data = $formRequest->validated();
        } else {
            $data = $request->all();
        }

        return $data;
    }

    protected function getFormRequestClass(): string {
        $modelClass = class_basename($this->model);
        $requestClass = "App\\Http\\Requests\\{$modelClass}Request";

        return $requestClass;
    }
}
