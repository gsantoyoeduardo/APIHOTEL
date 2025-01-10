<?php

namespace App\Domain\Main;

use App\Common\Exceptions\Domain\DomainException;
use App\Domain\Interface\ISucursalDomain;
use App\Infrastructure\Interface\ISucursalRepositoryEloquent;

class SucursalDomain implements ISucursalDomain
{

    private ISucursalRepositoryEloquent $SucursalRepositoryEloquent;

    public function __construct(ISucursalRepositoryEloquent $SucursalRepositoryEloquent)
    {
        $this->SucursalRepositoryEloquent = $SucursalRepositoryEloquent;
    }

    public function ObtenerTodo(): array
    {
        try {
            return $this->SucursalRepositoryEloquent->ObtenerTodo();
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function ObtenerPorId($id): object
    {
        try {
            return $this->SucursalRepositoryEloquent->ObtenerPorId($id);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Insertar(array $data): object
    {
        try {
            return $this->SucursalRepositoryEloquent->Insertar($data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Actualizar($id, array $data): bool
    {
        try {
            return $this->SucursalRepositoryEloquent->Actualizar($id, $data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Eliminar($id): bool
    {
        try {
            return $this->SucursalRepositoryEloquent->Eliminar($id);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }
    public function updateultimaauditoria($id, $idultimaauditoria): bool
    {
        try {
            return $this->SucursalRepositoryEloquent->updateultimaauditoria($id, $idultimaauditoria);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }
    public function desactivarSucursal($id, array $data): bool
    {
        try {
            return $this->SucursalRepositoryEloquent->desactivarSucursal($id, $data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }
}
