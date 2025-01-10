<?php

namespace App\Domain\Main;

use App\Common\Exceptions\Domain\DomainException;
use App\Domain\Interface\ILoteDomain;
use App\Infrastructure\Interface\ILoteRepositoryEloquent;

class LoteDomain implements ILoteDomain
{

    private ILoteRepositoryEloquent $LoteRepositoryEloquent;

    public function __construct(ILoteRepositoryEloquent $LoteRepositoryEloquent)
    {
        $this->LoteRepositoryEloquent = $LoteRepositoryEloquent;
    }

    public function ObtenerTodo(): array
    {
        try {
            return $this->LoteRepositoryEloquent->ObtenerTodo();
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function ObtenerPorId($id): object
    {
        try {
            return $this->LoteRepositoryEloquent->ObtenerPorId($id);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Insertar(array $data): object
    {
        try {
            return $this->LoteRepositoryEloquent->Insertar($data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Actualizar($id, array $data): bool
    {
        try {
            return $this->LoteRepositoryEloquent->Actualizar($id, $data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Eliminar($id): bool
    {
        try {
            return $this->LoteRepositoryEloquent->Eliminar($id);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }
    public function updateultimaauditoria($id, $idultimaauditoria): bool
    {
        try {
            return $this->LoteRepositoryEloquent->updateultimaauditoria($id, $idultimaauditoria);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }
    public function desactivarLote($id, array $data): bool
    {
        try {
            return $this->LoteRepositoryEloquent->desactivarLote($id, $data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }
}
