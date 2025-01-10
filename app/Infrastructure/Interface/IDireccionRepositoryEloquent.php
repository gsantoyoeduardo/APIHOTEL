<?php
namespace App\Infrastructure\Interface;

interface IDireccionRepositoryEloquent extends IBaseRepository
{
    public function updateultimaauditoria(int $id,int $idultimaauditoria): bool;
    public function desactivardireccion(int $id,array $data): bool;
}
