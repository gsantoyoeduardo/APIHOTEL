<?php

namespace App\Http\Requests\Almacen;

use App\Common\Constants\ValidationMessageConstants;
use App\Common\Exceptions\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AlmacenInsertarRequestValidacion extends FormRequest
{
    public function rules()
    {
        return [
            'idsucursal' => 'required|integer',
            'descripcion' => 'required|string',
            'idestado' => 'required|integer',
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
            'idsucursal.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'idsucursal.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'descripcion.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'descripcion.string' => ValidationMessageConstants::CAMPO_STRING,
            'idestado.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
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
