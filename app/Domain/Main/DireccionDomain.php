<?php

namespace App\Domain\Main;

use App\Common\Exceptions\Domain\DomainException;
use App\Domain\Interface\IDireccionDomain;
use App\Infrastructure\Interface\IDireccionRepositoryEloquent;

class DireccionDomain implements IDireccionDomain
{

    private IDireccionRepositoryEloquent $DireccionRepositoryEloquent;

    public function __construct(IDireccionRepositoryEloquent $DireccionRepositoryEloquent)
    {
        $this->DireccionRepositoryEloquent = $DireccionRepositoryEloquent;
    }

    public function ObtenerTodo(): array
    {
        try {
            return $this->DireccionRepositoryEloquent->ObtenerTodo();
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function ObtenerPorId($id):object
    {
        try {
            return $this->DireccionRepositoryEloquent->ObtenerPorId($id);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Insertar(array $data):object
    {
        try {
            return $this->DireccionRepositoryEloquent->Insertar($data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Actualizar($id, array $data):bool
    {
        try {
            return $this->DireccionRepositoryEloquent->Actualizar($id, $data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Eliminar($id):bool
    {
        try {
            return $this->DireccionRepositoryEloquent->Eliminar($id);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }
    public function updateultimaauditoria($id, $idultimaauditoria): bool
    {
        try {
            return $this->DireccionRepositoryEloquent->updateultimaauditoria($id, $idultimaauditoria);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }
    public function desactivarDireccion($id, array $data): bool
    {
        try {
            return $this->DireccionRepositoryEloquent->desactivarDireccion($id, $data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }
}
