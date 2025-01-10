<?php
namespace App\Infrastructure\Interface;

interface IAlmacenRepositoryEloquent extends IBaseRepository
{
    public function updateultimaauditoria(int $id,int $idultimaauditoria): bool;
    public function desactivaralmacen(int $id,array $data): bool;
    
}

