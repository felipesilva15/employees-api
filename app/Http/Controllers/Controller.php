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
        if (method_exists($this->model, 'rules')){
            $request->validate($this->model::rules());
        }
        
        $data = $this->model::create($request->all());

        return response()->json($data, 201);
    }

    public function update(Request $request, $id) {
        $data = $this->model::find($id);

        if (!$data) {
            throw new MasterNotFoundHttpException;
        }

        if (method_exists($this->model, 'rules')){
            $request->validate($this->model::rules());
        }
            
        $data->update($request->all());

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
}
