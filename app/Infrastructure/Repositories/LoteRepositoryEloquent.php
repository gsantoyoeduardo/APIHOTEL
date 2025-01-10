<?php

namespace App\Infrastructure\Repositories;

use App\Common\Exceptions\Infraestructure\RepositoryException;
use App\Domain\Model\Lote;
use App\Infrastructure\Interface\ILoteRepositoryEloquent;

class LoteRepositoryEloquent implements ILoteRepositoryEloquent
{
    public function ObtenerPorId(int $id): object
    {
        try {
            return Lote::find($id);
        } catch (\Throwable $e) {
            throw new RepositoryException("No se encuentra el id: {$id} en la tabla Lores", 404, $e);
        }
    }

    public function Insertar(array $data): object
    {
        try {
            $lote = new Lote();
            $lote->idpresentacion = $data['idpresentacion'];
            $lote->descripcion = $data['descripcion'];
            $lote->idserie = $data['idserie'];
            $lote->cantidad = $data['cantidad'];
            $lote->fechaingreso = $data['fechaingreso'];
            $lote->fechavencimiento = $data['fechavencimiento'];
            $lote->idestado = $data['idestado'];
            $lote->save();

            return $lote;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function Actualizar(int $id, array $data): bool
    {
        try {
            $lote = Lote::find($id);
            if (!$lote) {
                return false;
            }

            $lote->idpresentacion = $data['idpresentacion'];
            $lote->descripcion = $data['descripcion'];
            $lote->idserie = $data['idserie'];
            $lote->cantidad = $data['cantidad'];
            $lote->fechaingreso = $data['fechaingreso'];
            $lote->fechavencimiento = $data['fechavencimiento'];
            $lote->idestado = $data['idestado'];
            $lote->save();
            return true;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function updateUltimaAuditoria(int $id, int $idultimaauditoria): bool
    {
        try {
            $lote = Lote::find($id);
            if (!$lote) {
                return false;
            }
            $lote->idultimaauditorialote = $idultimaauditoria;

            $lote->save();
            return true;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function desactivarLote(int $id, array $data): bool
    {
        try {
            $lote = Lote::find($id);
            if (!$lote) {
                return false;
            }
            $lote->idestado = $data['idestado'];

            $lote->save();
            return true;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function Eliminar(int $id,$data=[]): bool
    {
        try {
            return (bool) Lote::destroy($id); //revisar las validaciones sus pro y contras en el request o en el eloquest.
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function obtenerTodo(): array
    {
        try {
            return (Lote::all())->toArray();
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
}
