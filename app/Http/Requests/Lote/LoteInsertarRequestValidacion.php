<?php

namespace App\Http\Requests\Lote;

use App\Common\Constants\ValidationMessageConstants;
use App\Common\Exceptions\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoteInsertarRequestValidacion extends FormRequest
{
    public function rules()
    {
        return [
            'idpresentacion' => 'required|integer',
            'descripcion' => 'required|string',
            'idserie' => 'required|integer',
            'cantidad' => 'required|integer',
            'fechaingreso' => 'required|date',
            'fechavencimiento' => 'required|date',
            'idestado' => 'required|integer',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'idpresentacion.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'idpresentacion.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'descripcion.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'descripcion.string' => ValidationMessageConstants::CAMPO_STRING,
            'idserie.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'idserie.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'cantidad.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'cantidad.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'fechaingreso.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'fechaingreso.date' => ValidationMessageConstants::CAMPO_FECHA,
            'fechavencimiento.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'fechavencimiento.date' => ValidationMessageConstants::CAMPO_FECHA,
            'idestado.required' => ValidationMessageConstants::CAMPO_REQUERIDO,
            'idestado.integer' => ValidationMessageConstants::CAMPO_ENTERO,
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator->errors()->toArray());
    }
}
