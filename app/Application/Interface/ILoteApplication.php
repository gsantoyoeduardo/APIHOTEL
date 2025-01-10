<?php
namespace App\Application\Interface;

interface ILoteApplication extends IBaseApplication
{
    public function updateultimaauditoria(int $id,int $idultimaauditoria): bool;
    public function desactivarLote(int $id,array $data): bool;
}

