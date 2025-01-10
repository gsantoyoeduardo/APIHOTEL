<?php

namespace App\Infrastructure\Repositories\Auditorias;

use App\Models\Auditorias\AuditoriaLote;
use App\Common\Exceptions\Infraestructure\RepositoryException;

class AuditoriaLoteRepositoryEloquent 
{
    public function findById(int $id): ?AuditoriaLote
    {
        try {
            return AuditoriaLote::find($id);
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function save(array $data): AuditoriaLote
    {
        try {
            return AuditoriaLote::create($data);
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function update(int $id, array $data): bool
    {
        try {
            $auditoria = AuditoriaLote::find($id);
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
            return (bool) AuditoriaLote::destroy($id);
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function obtenerTodo(): array
    {
        try {
            return AuditoriaLote::all()->toArray();
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
}
