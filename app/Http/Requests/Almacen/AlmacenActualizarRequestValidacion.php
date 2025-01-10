<?php

namespace App\Http\Requests\Almacen;

use App\Common\Constants\ValidationMessageConstants;
use App\Common\Exceptions\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AlmacenActualizarRequestValidacion extends FormRequest
{
    public function rules()
    {
        return [
            'idsucursal' => 'integer',
            'descripcion' => 'string',
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
            'idsucursal.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'descripcion.string' => ValidationMessageConstants::CAMPO_STRING,
            'idestado.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'idusuario.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'idusuario.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'observacion.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'observacion.string' => ValidationMessageConstants::CAMPO_STRING,
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // Lanzamos nuestra excepción personalizada de validación
        throw new ValidationException($validator->errors()->toArray());
    }
}
