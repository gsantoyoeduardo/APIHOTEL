<?php
namespace App\Domain\Interface;

interface ILoteDomain extends IBaseDomain
{
    public function updateultimaauditoria(int $id,int $idultimaauditoria): bool;
    public function desactivarLote(int $id,array $data): bool;
}

