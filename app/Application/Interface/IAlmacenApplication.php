<?php
namespace App\Application\Interface;

interface IAlmacenApplication extends IBaseApplication
{
    public function updateultimaauditoria(int $id, int $idultimaauditoria): bool;
    
    public function desactivarAlmacen(int $id, array $data): bool;
}

