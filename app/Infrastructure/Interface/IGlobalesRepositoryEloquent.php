<?php
namespace App\Infrastructure\Interface;

interface IGlobalesRepositoryEloquent extends IBaseRepository
{
    public function updateultimaauditoria(int $id,int $idultimaauditoria): bool;
    public function desactivarglobales(int $id,array $data): bool;
}

