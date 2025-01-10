<?php
namespace App\Domain\Interface;

interface IDireccionDomain extends IBaseDomain
{
    public function updateultimaauditoria(int $id,int $idultimaauditoria): bool;
    public function desactivarDireccion(int $id,array $data): bool;
}

