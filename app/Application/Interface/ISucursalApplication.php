<?php
namespace App\Application\Interface;

interface ISucursalApplication extends IBaseApplication
{
    public function updateultimaauditoria(int $id,int $idultimaauditoria): bool;
    public function desactivarSucursal(int $id,array $data): bool;
}

