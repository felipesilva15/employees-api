<?php

namespace App\Http\Controllers;

use App\Helpers\Utils;
use App\Http\Requests\QueryRequest;
use App\Models\EmployeeView;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    private readonly string $integrationMode;

    public function __construct(Request $request) {
        $this->request = $request;
        $this->integrationMode = "10004";
    }

    /**
     * @OA\Post(
     *      path="/api/REST/API.APDATA.V1/QUERYS",
     *      tags={"Query"},
     *      summary="Data query",
     *      @OA\RequestBody(
     *         required=true,
     *         description="Request body for query",
     *         @OA\JsonContent(ref="#/components/schemas/QueryRequest")
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          description="Query data",
     *          @OA\JsonContent(ref="#/components/schemas/QueryDTO")
     *      ),
     *      @OA\Response(
     *          response="401", 
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/ApiErrorDTO")
     *      ),
     *      security={{"bearerAuth":{}}}
     * )
     */
    public function index() {
        $formRequest = app(QueryRequest::class);
        $params = $formRequest->validated();

        $queryMethod = "query{$params['queryId']}";

        if (!method_exists($this, $queryMethod)) {
            return response()->json(["message" => "Query inválida!"]);
        }

        if ($params['integrationMode'] != $this->integrationMode) {
            return response()->json(["message" => "Integration mode inválido!"]);
        }

        $data = $this->$queryMethod($params);

        return response()->json($data, 200);
    }

    public function query10005($params) {
        $filters = [
            "Empresa" => [
                "field" => "Cod_Empresa",
                "operator" => "=",
                "type" => "string"
            ],
            "Data_Inicio" => [
                "field" => "Dt_admissao",
                "operator" => ">=",
                "type" => "date"
            ],
            "Data_Fim" => [
                "field" => "Dt_admissao",
                "operator" => "<=",
                "type" => "date"
            ]
        ];

        $model = new EmployeeView();
        $query = $model::query();

        if (isset($params["items"]) && count($params["items"])) {
            foreach ($params["items"] as $item) {
                $filter = $filters[$item['paramName']];
                $value = $item['value'];

                if ($filter['type'] == "date") {
                    $value = Utils::convertDate($value);  
                }

                $query->where($filter['field'], $filter['operator'], $value);
            }
        }

        $fields = Utils::getFieldsDetailsFromView($model->getTable());
        $data = $query->get()->toArray();

        $response = Utils::makeQueryResponse($fields, $data);

        return $response;
    }
}
