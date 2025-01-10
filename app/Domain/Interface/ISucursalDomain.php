<?php
namespace App\Domain\Interface;

interface ISucursalDomain extends IBaseDomain
{
    public function updateultimaauditoria(int $id,int $idultimaauditoria): bool;
    public function desactivarSucursal(int $id,array $data): bool;
}

