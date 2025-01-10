<?php
namespace App\Application\Interface;

interface IDireccionApplication extends IBaseApplication
{
    public function updateultimaauditoria(int $id,int $idultimaauditoria): bool;
    public function desactivarDireccion(int $id,array $data): bool;
}

