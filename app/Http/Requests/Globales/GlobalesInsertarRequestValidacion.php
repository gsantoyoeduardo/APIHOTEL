<?php

namespace App\Http\Requests\Globales;

use App\Common\Constants\ValidationMessageConstants;
use App\Common\Exceptions\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class GlobalesInsertarRequestValidacion extends FormRequest
{
    public function rules()
    {
        return [
            'idcabecera' => 'required|integer',
            'codigo' => 'required|string',
            'descripcion' => 'required|string',
            'idestado' => 'required|integer',
            'valorkey' => 'required|string',
            'valor1' => 'required|string',
            'valor2' => 'nullable|string',
            'valor3' => 'nullable|string',
            'valor4' => 'nullable|string',
            'correlativo' => 'required|integer',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'idcabecera.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'idcabecera.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'codigo.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'codigo.string' => ValidationMessageConstants::CAMPO_STRING,
            'descripcion.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'descripcion.string' => ValidationMessageConstants::CAMPO_STRING,
            'idestado.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'idestado.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'valorkey.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'valorkey.string' => ValidationMessageConstants::CAMPO_STRING,
            'valor1.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'valor1.string' => ValidationMessageConstants::CAMPO_STRING,
            'valor2.string' => ValidationMessageConstants::CAMPO_STRING,
            'valor3.string' => ValidationMessageConstants::CAMPO_STRING,
            'valor4.string' => ValidationMessageConstants::CAMPO_STRING,
            'correlativo.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'correlativo.integer' => ValidationMessageConstants::CAMPO_ENTERO,
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator->errors()->toArray());
    }
}
