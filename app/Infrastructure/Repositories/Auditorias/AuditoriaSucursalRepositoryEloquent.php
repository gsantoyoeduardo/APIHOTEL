<?php

namespace App\Infrastructure\Repositories\Auditorias;

use App\Models\Auditorias\AuditoriaSucursal;
use App\Common\Exceptions\Infraestructure\RepositoryException;

class AuditoriaSucursalRepositoryEloquent 
{
    public function findById(int $id): ?AuditoriaSucursal
    {
        try {
            return AuditoriaSucursal::find($id);
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function save(array $data): AuditoriaSucursal
    {
        try {
            return AuditoriaSucursal::create($data);
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function update(int $id, array $data): bool
    {
        try {
            $auditoria = AuditoriaSucursal::find($id);
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
            return (bool) AuditoriaSucursal::destroy($id);
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function obtenerTodo(): array
    {
        try {
            return AuditoriaSucursal::all()->toArray();
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
}
