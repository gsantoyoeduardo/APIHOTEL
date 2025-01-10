<?php
namespace App\Domain\Interface;

interface IAuditoriaBaseDomain
{
    /**
     * Crear un nuevo registro.
     *
     * @param array $data
     * @return object|null
     */
    public function Insertar(array $data): object;
}
