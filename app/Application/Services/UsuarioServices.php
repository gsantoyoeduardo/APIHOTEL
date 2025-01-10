<?php
namespace App\Application\Services;

use App\Application\Interface\IUsuarioApplication;
use App\Common\Exceptions\Application\ApplicationException;
use App\Domain\Interface\IUsuarioDomain;

class UsuarioServices implements IUsuarioApplication
{

    protected IUsuarioDomain $UsuarioDomain;
    public function __construct(IUsuarioDomain $UsuarioDomain)
    {
        $this->UsuarioDomain = $UsuarioDomain;
    }

    public function ObtenerPorId(int $id): object
    {
        try {
            return $this->UsuarioDomain->ObtenerPorId($id);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function Insertar(array $data): object
    {
        try {
            return $this->UsuarioDomain->Insertar($data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function Actualizar($id, array $data): bool
    {
        try {
            return $this->UsuarioDomain->Actualizar($id, $data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function Eliminar(int $id,$data): bool
    {
        try {
            return $this->UsuarioDomain->Eliminar($id,$data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function ObtenerTodo(): array
    {
        try {
            return $this->UsuarioDomain->ObtenerTodo();
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }
}
