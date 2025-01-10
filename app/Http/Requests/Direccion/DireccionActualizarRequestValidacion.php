<?php

namespace App\Http\Requests\Direccion;

use App\Common\Constants\ValidationMessageConstants;
use App\Common\Exceptions\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class DireccionActualizarRequestValidacion extends FormRequest
{
    public function rules()
    {
        return [
            'idpersona' => 'integer',
            'descripcion' => 'string',
            'principal' => 'boolean',
            'idestado' => 'integer',
            'idubigeo' => 'integer',
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
            'idpersona.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'descripcion.string' => ValidationMessageConstants::CAMPO_STRING,
            'principal.boolean' => ValidationMessageConstants::CAMPO_BOOLEANO,
            'idestado.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'idubigeo.integer' => ValidationMessageConstants::CAMPO_ENTERO,
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
