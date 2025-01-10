<?php

namespace App\Domain\Main;

use App\Common\Exceptions\Domain\DomainException;
use App\Domain\Interface\IAuditoriaBaseDomain;
use App\Infrastructure\Interface\IAuditoriaBaseRepositoryEloquent;

class AuditoriaBaseDomain implements IAuditoriaBaseDomain
{
    private IAuditoriaBaseRepositoryEloquent $AuditoriaBaseRepositoryEloquent;

    public function __construct(IAuditoriaBaseRepositoryEloquent $AuditoriaBaseRepositoryEloquent)
    {
        $this->AuditoriaBaseRepositoryEloquent = $AuditoriaBaseRepositoryEloquent;
    }

    public function Insertar(array $data): object
    {
        try {
            // Llamada al repositorio para insertar los datos
            return $this->AuditoriaBaseRepositoryEloquent->Insertar($data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }
}
