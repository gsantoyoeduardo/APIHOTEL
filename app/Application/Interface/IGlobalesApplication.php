<?php
namespace App\Application\Interface;

interface IGlobalesApplication extends IBaseApplication
{
    public function updateultimaauditoria(int $id,int $idultimaauditoria): bool;
    public function desactivarGlobales(int $id,array $data): bool;
}

