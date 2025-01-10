<?php

namespace App\Http\Requests\Lote;

use App\Common\Constants\ValidationMessageConstants;
use App\Common\Exceptions\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoteActualizarRequestValidacion extends FormRequest
{
    public function rules()
    {
        return [
            'idpresentacion' => 'sometimes|integer',
            'descripcion' => 'sometimes|string',
            'idserie' => 'sometimes|integer',
            'cantidad' => 'sometimes|integer',
            'fechaingreso' => 'sometimes|date',
            'fechavencimiento' => 'sometimes|date',
            'idestado' => 'sometimes|integer',
            'idultimaauditorialote' => 'sometimes|integer',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'idpresentacion.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'descripcion.string' => ValidationMessageConstants::CAMPO_STRING,
            'idserie.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'cantidad.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'fechaingreso.date' => ValidationMessageConstants::CAMPO_FECHA,
            'fechavencimiento.date' => ValidationMessageConstants::CAMPO_FECHA,
            'idestado.integer' => ValidationMessageConstants::CAMPO_ENTERO,
            'idultimaauditorialote.integer' => ValidationMessageConstants::CAMPO_ENTERO,
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator->errors()->toArray());
    }
}
