<?php

namespace App\Infrastructure\Repositories\Auditorias;

use App\Models\Auditorias\AuditoriaAlmacen;
use App\Common\Exceptions\Infraestructure\RepositoryException;

class AuditoriaAlmacenRepositoryEloquent 
{
    public function findById(int $id): ?AuditoriaAlmacen
    {
        try {
            return AuditoriaAlmacen::find($id);
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function save(array $data): AuditoriaAlmacen
    {
        try {
            return AuditoriaAlmacen::create($data);
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function update(int $id, array $data): bool
    {
        try {
            $auditoria = AuditoriaAlmacen::find($id);
            if (!$auditoria) {
                return false;
            }
            $auditoria->update($data);
            return true;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function delete(int $id): bool
    {
        try {
            return (bool) AuditoriaAlmacen::destroy($id);
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function obtenerTodo(): array
    {
        try {
            return AuditoriaAlmacen::all()->toArray();
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
}
