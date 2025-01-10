<?php

namespace App\Infrastructure\Repositories;

use App\Common\Exceptions\Infraestructure\RepositoryException;
use App\Domain\Model\Globales;
use App\Infrastructure\Interface\IGlobalesRepositoryEloquent;

class GlobalesRepositoryEloquent implements IGlobalesRepositoryEloquent
{
    public function ObtenerPorId(int $id): object
    {
        try {
            return Globales::find($id);
        } catch (\Throwable $e) {
            throw new RepositoryException("No se encuentra el id: {$id} en la tabla Globales", 404, $e);
        }
    }

    public function Insertar(array $data): object
    {
        try {
            $globales = new Globales();
            $globales->idcabecera = $data['idcabecera'];
            $globales->codigo = $data['codigo'];
            $globales->descripcion = $data['descripcion'];
            $globales->idestado = $data['idestado'];
            $globales->valorkey = $data['valorkey'];
            $globales->valor1 = $data['valor1'];
            $globales->valor2 = $data['valor2'];
            $globales->valor3 = $data['valor3'];
            $globales->valor4 = $data['valor4'];
            $globales->correlativo = $data['correlativo'];
            $globales->save();

            return $globales;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function Actualizar(int $id, array $data): bool
    {
        try {
            $globales = Globales::find($id);
            if (!$globales) {
                return false;
            }

            $globales->idcabecera = $data['idcabecera'];
            $globales->codigo = $data['codigo'];
            $globales->descripcion = $data['descripcion'];
            $globales->idestado = $data['idestado'];
            $globales->valorkey = $data['valorkey'];
            $globales->valor1 = $data['valor1'];
            $globales->valor2 = $data['valor2'];
            $globales->valor3 = $data['valor3'];
            $globales->valor4 = $data['valor4'];
            $globales->correlativo = $data['correlativo'];
            $globales->save();

            return true;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function updateultimaauditoria(int $id, int $idultimaauditoria): bool
    {
        try {
            $globales = Globales::find($id);
            if (!$globales) {
                return false;
            }
            $globales->idultimaauditoriaglobal = $idultimaauditoria;
            $globales->save();

            return true;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function desactivarGlobales(int $id, array $data): bool
    {
        try {
            $globales = Globales::find($id);
            if (!$globales) {
                return false;
            }
            $globales->idestado = $data['idestado'];
            $globales->save();

            return true;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function Eliminar(int $id,$data=[]): bool
    {
        try {
            return (bool) Globales::destroy($id);
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function ObtenerTodo(): array
    {
        try {
            return (Globales::all())->toArray();
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
}
