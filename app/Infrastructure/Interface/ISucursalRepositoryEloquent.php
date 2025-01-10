<?php
namespace App\Infrastructure\Interface;

interface ISucursalRepositoryEloquent extends IBaseRepository
{
    public function updateultimaauditoria(int $id,int $idultimaauditoria): bool;
    public function desactivarsucursal(int $id,array $data): bool;
}

