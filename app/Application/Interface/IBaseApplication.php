<?php
namespace App\Application\Interface;

interface IBaseApplication
{

    /**
     * Obtener un registro por su ID.
     *
     * @param int $id
     * @return object|null
     */
    public function ObtenerPorId(int $id): object;

    /**
     * Obtener todos los registros.
     *
     * @return array
     */
    public function ObtenerTodo(): array;

    /**
     * Crear un nuevo registro.
     *
     * @param array $data
     * @return object|null
     */
    public function Insertar(array $data): object;

    /**
     * Actualizar un registro existente por su ID.
     *
     * @param int $id
     * @param array $data
     * @return bool|null
     */
    public function Actualizar(int $id, array $data): bool;

    /**
     * Eliminar un registro por su ID.
     *
     * @param int $id
     * @return bool
     */
    public function Eliminar(int $id, array $data): bool;
}
