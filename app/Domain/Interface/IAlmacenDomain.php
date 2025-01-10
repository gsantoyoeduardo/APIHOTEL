<?php
namespace App\Domain\Interface;

interface IAlmacenDomain extends IBaseDomain
{

    public function updateultimaauditoria(int $id, int $idultimaauditoria): bool;

    public function desactivarAlmacen(int $id, array $data): bool;
}
