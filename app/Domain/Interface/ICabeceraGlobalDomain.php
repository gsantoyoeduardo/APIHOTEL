<?php
namespace App\Domain\Interface;

interface ICabeceraGlobalDomain extends IBaseDomain
{

    /**
     * Obtener todos los registros.
     *
     * @param array $data
     * @return array
     */
    public function FilterSearch(array $data):array;
}
