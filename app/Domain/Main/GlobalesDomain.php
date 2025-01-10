<?php

namespace App\Domain\Main;

use App\Common\Exceptions\Domain\DomainException;
use App\Domain\Interface\IGlobalesDomain;
use App\Infrastructure\Interface\IGlobalesRepositoryEloquent;

class GlobalesDomain implements IGlobalesDomain
{

    private IGlobalesRepositoryEloquent $GlobalesRepositoryEloquent;

    public function __construct(IGlobalesRepositoryEloquent $GlobalesRepositoryEloquent)
    {
        $this->GlobalesRepositoryEloquent = $GlobalesRepositoryEloquent;
    }

    public function ObtenerTodo(): array
    {
        try {
            return $this->GlobalesRepositoryEloquent->ObtenerTodo();
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function ObtenerPorId($id): object
    {
        try {
            return $this->GlobalesRepositoryEloquent->ObtenerPorId($id);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Insertar(array $data): object
    {
        try {
            return $this->GlobalesRepositoryEloquent->Insertar($data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Actualizar($id, array $data): bool
    {
        try {
            return $this->GlobalesRepositoryEloquent->Actualizar($id, $data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Eliminar($id): bool
    {
        try {
            return $this->GlobalesRepositoryEloquent->Eliminar($id);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }
    public function updateultimaauditoria($id, $idultimaauditoria): bool
    {
        try {
            return $this->GlobalesRepositoryEloquent->updateultimaauditoria($id, $idultimaauditoria);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }
    public function desactivarGlobales($id, array $data): bool
    {
        try {
            return $this->GlobalesRepositoryEloquent->desactivarGlobales($id, $data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }
}
