<?php
namespace App\Infrastructure\Interface;

interface ILoteRepositoryEloquent extends IBaseRepository
{
    public function updateultimaauditoria(int $id,int $idultimaauditoria): bool;
    public function desactivarlote(int $id,array $data): bool;
}

