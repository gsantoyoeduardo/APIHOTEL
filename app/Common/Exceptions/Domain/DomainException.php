<?php
namespace App\Common\Exceptions\Domain;

use App\Common\Exceptions\BaseException;

class DomainException extends BaseException
{

    public function __construct(string $message = "A domain error occurred", int $code = 400, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
