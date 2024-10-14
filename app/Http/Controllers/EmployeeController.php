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

    /**
     * @OA\Get(
     *      path="/api/employee",
     *      tags={"Employee"},
     *      summary="List all employees",
     *      @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Employee ID",
     *         @OA\Schema(type="integer")
     *      ),
     *      @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="Employee name",
     *         @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *         name="cpf",
     *         in="query",
     *         description="Employee CPF",
     *         @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *         name="registration_number",
     *         in="query",
     *         description="Employee registration number",
     *         @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *         name="gender",
     *         in="query",
     *         description="Employee gender",
     *         @OA\Schema(type="integer")
     *      ),
     *      @OA\Parameter(
     *         name="cpts_number",
     *         in="query",
     *         description="Employee CPTS number",
     *         @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *         name="cpts_serial",
     *         in="query",
     *         description="Employee CPTS serial",
     *         @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *         name="cpts_uf",
     *         in="query",
     *         description="Employee CPTS UF",
     *         @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *         name="cpts_date",
     *         in="query",
     *         description="Employee CPTS date",
     *         @OA\Schema(type="string", format="date")
     *      ),
     *      @OA\Parameter(
     *         name="admission_date",
     *         in="query",
     *         description="Employee admission date",
     *         @OA\Schema(type="string", format="date")
     *      ),
     *      @OA\Parameter(
     *         name="dismissal_date",
     *         in="query",
     *         description="Employee dismissal date",
     *         @OA\Schema(type="string", format="date")
     *      ),
     *      @OA\Parameter(
     *         name="cost_center",
     *         in="query",
     *         description="Employee cost center",
     *         @OA\Schema(type="integer")
     *      ),
     *      @OA\Parameter(
     *         name="capacity_unit",
     *         in="query",
     *         description="Employee capacity unit",
     *         @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *         name="salary",
     *         in="query",
     *         description="Employee salary",
     *         @OA\Schema(type="number", format="float")
     *      ),
     *      @OA\Parameter(
     *         name="rg",
     *         in="query",
     *         description="Employee RG",
     *         @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *         name="position_id",
     *         in="query",
     *         description="Employee position ID",
     *         @OA\Schema(type="integer")
     *      ),
     *      @OA\Parameter(
     *         name="enterprise_id",
     *         in="query",
     *         description="Employee enterprise ID",
     *         @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          description="Employee list",
     *          @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Employee")
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
     *      path="/api/employee/{id}",
     *      tags={"Employee"},
     *      summary="List an employee by ID",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Employee ID",
     *         @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          description="Employee data",
     *          @OA\JsonContent(ref="#/components/schemas/Employee")
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
     *      path="/api/employee",
     *      tags={"Employee"},
     *      summary="Registers an employee",
     *      @OA\RequestBody(
     *         required=true,
     *         description="Data for creating a new employee",
     *         @OA\JsonContent(ref="#/components/schemas/Employee")
     *      ),
     *      @OA\Response(
     *          response="201", 
     *          description="Registered employee data",
     *          @OA\JsonContent(ref="#/components/schemas/Employee")
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
     *      path="/api/employee/{id}",
     *      tags={"Employee"},
     *      summary="Update an employee",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Employee ID",
     *         @OA\Schema(type="integer")
     *      ),
     *      @OA\RequestBody(
     *         required=true,
     *         description="Data for update employee",
     *         @OA\JsonContent(ref="#/components/schemas/Employee")
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          description="Updated employee data",
     *          @OA\JsonContent(ref="#/components/schemas/Employee")
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
     *      path="/api/employee/{id}",
     *      tags={"Employee"},
     *      summary="Deletes an employee",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Employee ID",
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
