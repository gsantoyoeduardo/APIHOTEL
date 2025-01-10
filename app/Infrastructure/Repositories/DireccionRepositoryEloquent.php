<?php

namespace App\Infrastructure\Repositories;


use App\Common\Exceptions\Infraestructure\RepositoryException;
use App\Domain\Model\Direccion;
use App\Infrastructure\Interface\IDireccionRepositoryEloquent;

class DireccionRepositoryEloquent implements IDireccionRepositoryEloquent
{
    public function ObtenerPorId(int $id): object
    {
        try {
            return Direccion::find($id);
        } catch (\Throwable $e) {
            throw new RepositoryException("No se encuentra el id: {$id} en la tabla Direcciones", 404, $e);
        }
    }

    public function Insertar(array $data): object
    {
        try {
            $direccion = new Direccion();
            $direccion->idpersona = $data['idpersona'];
            $direccion->descripcion = $data['descripcion'];
            $direccion->principal = $data['principal'];
            $direccion->idubigeo = $data['idubigeo'];
            $direccion->idestado = $data['idestado'];
            //$direccion->idultimaauditoriadireccion = $data['idultimaauditoriadireccion'];
            $direccion->save();

            return $direccion;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
    public function Actualizar(int $id, array $data): bool
    {
        try {
            $direccion = Direccion::find($id);
            if (!$direccion) {
                return false;
            }

            $direccion->descripcion = $data['descripcion'];
            $direccion->principal = $data['principal'];
            $direccion->idubigeo = $data['idubigeo'];
            $direccion->idestado = $data['idestado'];
            $direccion->save();
            return true;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
    public function updateultimaauditoria(int $id, int $idultimaauditoria): bool
    {
        try {
            $direccion = Direccion::find($id);
            if (!$direccion) {
                return false;
            }
            $direccion->idultimaauditoriadireccion = $idultimaauditoria;

            $direccion->save();
            return true;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
    public function desactivardireccion(int $id, array $data): bool
    {
        try {
            $direccion = Direccion::find($id);
            if (!$direccion) {
                return false;
            }
            $direccion->idestado = $data['idestado'];

            $direccion->save();
            return true;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function Eliminar(int $id,$data=[]): bool
    {
        try {
            return (bool) Direccion::destroy($id);
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
    public function obtenerTodo(): array
    {
        try {
            return (Direccion::all())->toArray();
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
}
