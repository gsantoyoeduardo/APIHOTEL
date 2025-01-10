<?php

namespace App\Domain\Main;

use App\Common\Exceptions\Domain\DomainException;
use App\Domain\Interface\ICabeceraGlobalDomain;
use App\Infrastructure\Interface\ICabeceraGlobalRepositoryEloquent;

class CabeceraGlobalDomain implements ICabeceraGlobalDomain
{

    private ICabeceraGlobalRepositoryEloquent $CabeceraGlobalRepositoryEloquent;

    public function __construct(ICabeceraGlobalRepositoryEloquent $CabeceraGlobalRepositoryEloquent)
    {
        $this->CabeceraGlobalRepositoryEloquent = $CabeceraGlobalRepositoryEloquent;
    }

    public function ObtenerTodo(): array
    {
        try {
            return $this->CabeceraGlobalRepositoryEloquent->ObtenerTodo();
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function ObtenerPorId($id):object
    {
        try {
            return $this->CabeceraGlobalRepositoryEloquent->ObtenerPorId($id);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Insertar(array $data):object
    {
        try {
            return $this->CabeceraGlobalRepositoryEloquent->Insertar($data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Actualizar($id, array $data):bool
    {
        try {
            return $this->CabeceraGlobalRepositoryEloquent->Actualizar($id, $data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function FilterSearch(array $data):array
    {
        try {
            return $this->CabeceraGlobalRepositoryEloquent->FilterSearch($data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Eliminar($id):bool
    {
        try {
            return $this->CabeceraGlobalRepositoryEloquent->Eliminar($id);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }
}
