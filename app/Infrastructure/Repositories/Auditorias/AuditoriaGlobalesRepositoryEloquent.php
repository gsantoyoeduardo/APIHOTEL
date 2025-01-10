<?php

namespace App\Infrastructure\Repositories\Auditorias;

use App\Models\Auditorias\AuditoriaGlobales;
use App\Common\Exceptions\Infraestructure\RepositoryException;

class AuditoriaGlobalesRepositoryEloquent 
{
    public function findById(int $id): ?AuditoriaGlobales
    {
        try {
            return AuditoriaGlobales::find($id);
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function save(array $data): AuditoriaGlobales
    {
        try {
            return AuditoriaGlobales::create($data);
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function update(int $id, array $data): bool
    {
        try {
            $auditoria = AuditoriaGlobales::find($id);
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
            return (bool) AuditoriaGlobales::destroy($id);
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function obtenerTodo(): array
    {
        try {
            return AuditoriaGlobales::all()->toArray();
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
}
