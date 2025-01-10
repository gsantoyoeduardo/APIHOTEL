<?php

namespace App\Common\Exceptions\Validation;

use App\Common\Constants\AppConstants;
use App\Common\Exceptions\BaseException;
use Illuminate\Http\Exceptions\HttpResponseException;

class ValidationException extends HttpResponseException
{
    protected $errors;

    /**
     * El constructor de la excepción personalizada para errores de validación.
     *
     * @param array $errors Los errores de validación que se deben devolver.
     * @param string $message Mensaje de error personalizado.
     * @param int $code Código de estado HTTP (por defecto, 422 para validación fallida).
     * @param \Throwable|null $previous La excepción previa para la cadena de excepciones.
     */
    public function __construct(array $errors, string $message = 'Errores de validación', int $code = 422, ?\Throwable $previous = null)
    {
        $this->errors = $errors;
        parent::__construct(response()->json([
            'codigo' => AppConstants::ERROR_CODE,
            'mensaje' => $message,
            'errors' => $errors
        ], $code));
    }

    /**
     * Obtiene los errores de validación.
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
