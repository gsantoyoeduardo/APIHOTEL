<?php
namespace App\Common\Exceptions\Application;

use App\Common\Exceptions\BaseException;

class ApplicationException extends BaseException
{

    /**
     * El constructor de la excepción personalizada para la capa de aplicación.
     *
     * @param string $message
     *            El mensaje de error que deseas mostrar.
     * @param int $code
     *            El código HTTP o código de error. Por defecto, 400.
     * @param \Throwable|null $previous
     *            La excepción previa para la cadena de excepciones.
     */
    public function __construct(string $message = "An application error occurred", int $code = 400, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
