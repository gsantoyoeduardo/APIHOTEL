<?php

namespace App\Infrastructure\Repositories;

use App\Common\Constants\TableConstants;
use App\Common\Exceptions\Infraestructure\RepositoryException;
use App\Domain\Model\Usuario;
use Illuminate\Support\Facades\Hash;
use App\Infrastructure\Interface\IUsuarioRepositoryEloquent;

class UsuarioRepositoryEloquent implements IUsuarioRepositoryEloquent
{
    public function ObtenerPorId(int $id): object
    {
        try {
            $usuario = Usuario::find($id) ?? new Usuario();
            return $usuario;
        } catch (\Throwable $e) {
            throw new RepositoryException("No se pudo encontrar el usuario con ID {$id} Usuario", 404, $e);
        }
    }

    public function Insertar(array $data): object
    {
        try {
            $usuario = new Usuario();
            $usuario->idpersona = $data['idpersona'];
            $usuario->usuario = $data['usuario'];
            $usuario->password = Hash::make($data['password']);
            $usuario->tiporecuperacion = $data['tiporecuperacion'];
            $usuario->respuestaseguridad = $data['respuestaseguridad'];
            $usuario->idestado = TableConstants::ESTADOS_USUARIO['ACTIVO'];
            $usuario->save();
            //! AQUI DEBERIA IR LAS AUDITORIAS

            return $usuario;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
    //aqui por defecto debe de retornar el usuario ya actualizado para que dinamicamente se actualice en el front sin la necesidad de  actualizar la pg
    //* por definir bien el tema de actualizacion de usuario
    public function Actualizar(int $id, array $data): bool
    {
        try {
            $usuario = Usuario::find($id);
            if(!$usuario){ return false;}
            $usuario->usuario = $data['usuario'];
            $usuario->tiporecuperacion = $data['tiporecuperacion'];
            $usuario->respuestaseguridad = $data['respuestaseguridad'];
            $usuario->save();
            return true;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function Eliminar(int $id,$data=[]): bool
    {
        try {
            $usuario = Usuario::find($id);
            if(!$usuario){ return false;}
            $usuario->idestado = TableConstants::ESTADOS_USUARIO['ELIMINADO'];
            return (bool) $usuario->save();
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
    public function ObtenerTodo(): array
    {
        try {
            return (Usuario::all())->toArray();
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }


}
