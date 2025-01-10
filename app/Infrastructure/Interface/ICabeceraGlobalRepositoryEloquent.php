<?php
namespace App\Infrastructure\Interface;

interface ICabeceraGlobalRepositoryEloquent extends IBaseRepository
{
    /**
     * Obtener todos los registros.
     *
     * @param array $data
     * @return array
     */
    public function FilterSearch(array $data):array;
}

