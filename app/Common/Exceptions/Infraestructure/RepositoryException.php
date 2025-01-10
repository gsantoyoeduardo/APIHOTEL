<?php

namespace App\Common\Exceptions\Infraestructure;

use App\Common\Exceptions\BaseException;

class RepositoryException extends BaseException
{
    public function __construct(string $message = "Se produjo un error en el repositorio", int $code = 500, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}