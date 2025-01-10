<?php
namespace App\Domain\Interface;

interface IGlobalesDomain extends IBaseDomain
{
    public function updateultimaauditoria(int $id,int $idultimaauditoria): bool;
    public function desactivarGlobales(int $id,array $data): bool;
}

