<?php

namespace App\Infrastructure\Repositories;


use App\Common\Exceptions\Infraestructure\RepositoryException;
use App\Domain\Model\Sucursal;
use App\Infrastructure\Interface\ISucursalRepositoryEloquent;

class SucursalRepositoryEloquent implements ISucursalRepositoryEloquent
{
    public function ObtenerPorId(int $id): object
    {
        try {
            return Sucursal::find($id);
        } catch (\Throwable $e) {
            throw new RepositoryException("No se encuentra el id: {$id} en la tabla Sucursales", 404, $e);
        }
    }

    public function Insertar(array $data): object
    {
        try {
            $sucursal = new Sucursal();
            $sucursal->descripcion = $data['descripcion'];
            $sucursal->idubigeo = $data['idubigeo'];
            $sucursal->idestado = $data['idestado'];
            $sucursal->save();

            return $sucursal;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
    public function Actualizar(int $id, array $data): bool
    {
        try {
            $sucursal = Sucursal::find($id);
            if (!$sucursal) {
                return false;
            }

            $sucursal->descripcion = $data['descripcion'];
            $sucursal->idubigeo = $data['idubigeo'];
            $sucursal->idestado = $data['idestado'];
            $sucursal->save();
            return true;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
    public function updateultimaauditoria(int $id, int $idultimaauditoria): bool
    {
        try {
            $sucursal = Sucursal::find($id);
            if (!$sucursal) {
                return false;
            }
            $sucursal->idultimaauditoriasucursal = $idultimaauditoria;

            $sucursal->save();
            return true;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
    public function desactivarSucursal(int $id, array $data): bool
    {
        try {
            $sucursal = Sucursal::find($id);
            if (!$sucursal) {
                return false;
            }
            $sucursal->idestado = $data['idestado'];

            $sucursal->save();
            return true;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function Eliminar(int $id,$data=[]): bool
    {
        try {
            return (bool) Sucursal::destroy($id);
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
    public function obtenerTodo(): array
    {
        try {
            return (Sucursal::all())->toArray();
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
}
