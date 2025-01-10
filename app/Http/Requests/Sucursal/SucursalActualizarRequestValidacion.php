<?php

namespace App\Http\Requests\Sucursal;

use App\Common\Constants\ValidationMessageConstants;
use App\Common\Exceptions\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SucursalActualizarRequestValidacion extends FormRequest
{
    public function rules()
    {
        return [
            'descripcion' => 'string',
            'idubigeo' => 'integer',
            'idestado' => 'integer',
            'idusuario' => 'required|integer',
            'observacion' => 'required|string',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'descripcion.string' => ValidationMessageConstants::CAMPO_STRING,
            'idubigeo.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'idestado.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'idusuario.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'idusuario.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'observacion.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'observacion.string' => ValidationMessageConstants::CAMPO_STRING,
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator->errors()->toArray());
    }
}
