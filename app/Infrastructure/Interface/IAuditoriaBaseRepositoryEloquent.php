<?php
namespace App\Infrastructure\Interface;

interface IAuditoriaBaseRepositoryEloquent
{
    /**
     * Crear un nuevo registro.
     *
     * @param array $data
     * @return object|null
     */
    public function Insertar(array $data): object;
}
