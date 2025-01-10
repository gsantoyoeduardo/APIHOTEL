<?php


namespace App\Common\Exceptions\Domain;

use App\Common\Exceptions\BaseException;
use DomainException;

class EntityNotFoundException extends DomainException
{
    public function __construct(string $entity = "Entity", int $code = 404, ?\Throwable $previous = null)
    {
        $message = "{$entity} not found.";
        parent::__construct($message, $code, $previous);
    }
}
