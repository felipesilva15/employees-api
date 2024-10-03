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

    /**
     * @OA\Get(
     *      path="/api/application",
     *      tags={"Application"},
     *      summary="List all applications",
     *      @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Application ID",
     *         @OA\Schema(type="integer")
     *      ),
     *      @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="Application name",
     *         @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *         name="client_id",
     *         in="query",
     *         description="Application Client ID",
     *         @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          description="Application list",
     *          @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Application")
     *         )
     *      ),
     *      @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/ApiErrorDTO")
     *      )
     * )
     */
    public function index() {
        return parent::index();
    }

    /**
     * @OA\Get(
     *      path="/api/application/{id}",
     *      tags={"Application"},
     *      summary="List an application by ID",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Application ID",
     *         @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          description="Application data",
     *          @OA\JsonContent(ref="#/components/schemas/Application")
     *      ),
     *      @OA\Response(
     *          response="401", 
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/ApiErrorDTO")
     *      ),
     *      @OA\Response(
     *          response="404", 
     *          description="Record not found",
     *          @OA\JsonContent(ref="#/components/schemas/ApiErrorDTO")
     *      )
     * )
     */
    public function show($id) {
        return parent::show($id);
    }

    /**
     * @OA\Post(
     *      path="/api/application",
     *      tags={"Application"},
     *      summary="Registers an application",
     *      @OA\RequestBody(
     *         required=true,
     *         description="Data for creating a new application",
     *         @OA\JsonContent(ref="#/components/schemas/Application")
     *      ),
     *      @OA\Response(
     *          response="201", 
     *          description="Registered application data",
     *          @OA\JsonContent(ref="#/components/schemas/Application")
     *      ),
     *      @OA\Response(
     *          response="401", 
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/ApiErrorDTO")
     *      )
     * )
     */
    public function store(Request $request) {
        return parent::store($request);
    }

    /**
     * @OA\Put(
     *      path="/api/application/{id}",
     *      tags={"Application"},
     *      summary="Update an application",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Application ID",
     *         @OA\Schema(type="integer")
     *      ),
     *      @OA\RequestBody(
     *         required=true,
     *         description="Data for update application",
     *         @OA\JsonContent(ref="#/components/schemas/Application")
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          description="Updated application data",
     *          @OA\JsonContent(ref="#/components/schemas/Application")
     *      ),
     *      @OA\Response(
     *          response="401", 
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/ApiErrorDTO")
     *      ),
     *      @OA\Response(
     *          response="404", 
     *          description="Record not found",
     *          @OA\JsonContent(ref="#/components/schemas/ApiErrorDTO")
     *      )
     * )
     */
    public function update(Request $request, $id) {
        return parent::update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/api/application/{id}",
     *      tags={"Application"},
     *      summary="Deletes an application",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Application ID",
     *         @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          description="Return message",
     *          @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Registro deletado com sucesso!")
     *         )
     *      ),
     *      @OA\Response(
     *          response="401", 
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/ApiErrorDTO")
     *      ),
     *      @OA\Response(
     *          response="404", 
     *          description="Record not found",
     *          @OA\JsonContent(ref="#/components/schemas/ApiErrorDTO")
     *      )
     * )
     */
    public function destroy( $id) {
        return parent::destroy($id);
    }
}
