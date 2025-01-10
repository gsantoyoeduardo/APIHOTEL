<?php

namespace App\Http\Requests\Direccion;

use App\Common\Constants\ValidationMessageConstants;
use App\Common\Exceptions\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class DireccionInsertarRequestValidacion extends FormRequest
{
    public function rules()
    {
        return [
            'idpersona' => 'required|integer',
            'descripcion' => 'required|string',
            'principal' => 'required|boolean',
            'idestado' => 'required|integer',
            'idubigeo' => 'required|integer',
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
            'idpersona.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'idpersona.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'descripcion.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'descripcion.string' => ValidationMessageConstants::CAMPO_STRING,
            'principal.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'principal.boolean' => ValidationMessageConstants::CAMPO_BOOLEANO,
            'idestado.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'idestado.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'idubigeo.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
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
