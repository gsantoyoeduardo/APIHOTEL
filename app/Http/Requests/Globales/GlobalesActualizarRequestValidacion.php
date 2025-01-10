<?php

namespace App\Http\Requests\Globales;

use App\Common\Constants\ValidationMessageConstants;
use App\Common\Exceptions\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class GlobalesActualizarRequestValidacion extends FormRequest
{
    public function rules()
    {
        return [
            'idcabecera' => 'sometimes|integer',
            'codigo' => 'sometimes|string',
            'descripcion' => 'sometimes|string',
            'idestado' => 'sometimes|integer',
            'valorkey' => 'sometimes|string',
            'valor1' => 'sometimes|string',
            'valor2' => 'nullable|string',
            'valor3' => 'nullable|string',
            'valor4' => 'nullable|string',
            'correlativo' => 'sometimes|integer',
            'idultimaauditoriaglobal' => 'sometimes|integer',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'idcabecera.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'codigo.string' => ValidationMessageConstants::CAMPO_STRING,
            'descripcion.string' => ValidationMessageConstants::CAMPO_STRING,
            'idestado.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'valorkey.string' => ValidationMessageConstants::CAMPO_STRING,
            'valor1.string' => ValidationMessageConstants::CAMPO_STRING,
            'valor2.string' => ValidationMessageConstants::CAMPO_STRING,
            'valor3.string' => ValidationMessageConstants::CAMPO_STRING,
            'valor4.string' => ValidationMessageConstants::CAMPO_STRING,
            'correlativo.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'idultimaauditoriaglobal.integer' => ValidationMessageConstants::CAMPO_ENTERO,
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator->errors()->toArray());
    }
}
