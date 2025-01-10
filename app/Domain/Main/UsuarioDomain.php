<?php

namespace App\Domain\Main;

use App\Common\Exceptions\Domain\DomainException;
use App\Domain\Interface\IUsuarioDomain;
use App\Infrastructure\Interface\IUsuarioRepositoryEloquent;

class UsuarioDomain implements IUsuarioDomain
{

    private IUsuarioRepositoryEloquent $UsuarioRepositoryEloquent;

    public function __construct(IUsuarioRepositoryEloquent $UsuarioRepositoryEloquent)
    {
        $this->UsuarioRepositoryEloquent = $UsuarioRepositoryEloquent;
    }

    public function ObtenerTodo(): array
    {
        try {
            return $this->UsuarioRepositoryEloquent->ObtenerTodo();
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function ObtenerPorId($id): object
    {
        try {
            return $this->UsuarioRepositoryEloquent->ObtenerPorId($id);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Insertar(array $data): object
    {
        try {
            return $this->UsuarioRepositoryEloquent->Insertar($data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Actualizar($id, array $data): bool
    {
        try {
            return $this->UsuarioRepositoryEloquent->Actualizar($id, $data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }

    public function Eliminar($id,$data): bool
    {
        try {
            return $this->UsuarioRepositoryEloquent->Eliminar($id,$data);
        } catch (\Exception $e) {
            throw new DomainException($e->getMessage(), 404, $e);
        }
    }
}
