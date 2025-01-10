<?php

namespace App\Domain\Main;

use App\Common\Exceptions\Domain\DomainException;
use App\Domain\Interface\IAlmacenDomain;
use App\Infrastructure\Interface\IAlmacenRepositoryEloquent;

class AlmacenDomain implements IAlmacenDomain
{

    private IAlmacenRepositoryEloquent $AlmacenRepositoryEloquent;

    public function __construct(IAlmacenRepositoryEloquent $AlmacenRepositoryEloquent)
    {
        $this->AlmacenRepositoryEloquent = $AlmacenRepositoryEloquent;
    }

    public function ObtenerTodo(): array
    {
        try {
            return $this->AlmacenRepositoryEloquent->ObtenerTodo();
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function ObtenerPorId($id) : object
    {
        try {
            return $this->AlmacenRepositoryEloquent->ObtenerPorId($id);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Insertar(array $data) : object
    {
        try {
            return $this->AlmacenRepositoryEloquent->Insertar($data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Actualizar($id, array $data) :bool
    {
        try {
            return $this->AlmacenRepositoryEloquent->Actualizar($id, $data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Eliminar($id, array $data) : bool
    {
        try {
            return $this->AlmacenRepositoryEloquent->Eliminar($id, $data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }
    public function updateultimaauditoria($id, $idultimaauditoria): bool
    {
        try {
            return $this->AlmacenRepositoryEloquent->updateultimaauditoria($id, $idultimaauditoria);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }
    public function desactivarAlmacen($id, array $data): bool
    {
        try {
            return $this->AlmacenRepositoryEloquent->desactivaralmacen($id, $data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }
}
