<?php

namespace App\Infrastructure\Repositories\Auditorias;

use App\Models\Auditorias\AuditoriaDireccion;
use App\Common\Exceptions\Infraestructure\RepositoryException;

class AuditoriaDireccionRepositoryEloquent
{
    public function findById(int $id): ?AuditoriaDireccion
    {
        try {
            return AuditoriaDireccion::find($id);
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function save(array $data): AuditoriaDireccion
    {
        try {
            return AuditoriaDireccion::create($data);
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function update(int $id, array $data): bool
    {
        try {
            $auditoria = AuditoriaDireccion::find($id);
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
            return (bool) AuditoriaDireccion::destroy($id);
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function obtenerTodo(): array
    {
        try {
            return AuditoriaDireccion::all()->toArray();
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
}
