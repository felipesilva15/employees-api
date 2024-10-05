<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      schema="QueryRequest",
 *      required={"integrationMode", "queryId"},
 *      @OA\Property(property="integrationMode", type="string", example="10000"),
 *      @OA\Property(property="queryId", type="integer", example=10000),
 *      @OA\Property(
 *          property="items", 
 *          type="array",
 *          @OA\Items(
 *              @OA\Property(property="paramName", type="string", example="Data_Inicio"),
 *              @OA\Property(property="value", type="string", example="2024/01/01")
 *          )
 *      )
 * )
 */
class QueryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'integrationMode' => 'required|string',
            'queryId' => 'required|int',
            'items' => 'array|nullable',
            'items.*.paramName' => 'string',
            'items.*.value' => 'string',
        ];
    }
}
