<?php

namespace App\Domain\Model;

use Illuminate\Database\Eloquent\Model;

class AuditoriaBase extends Model
{
    protected $table; // Nombre de la tabla.
    protected $primaryKey; // Nombre de la clave primaria.
    protected $referenceFieldName; // Nombre dinámico del campo de referencia.
    public $timestamps = false;

    protected $fillable = [
        'idusuario',
        'fecharegistro',
        'horaregistro',
        'idtipooperacion',
        'newdata',
        'observacion',
    ];

    /**
     * Configura dinámicamente la tabla, clave primaria y nombre del campo de referencia.
     *
     * @param string $tableName Nombre de la tabla.
     * @param string $primaryKeyName Nombre de la clave primaria.
     * @param string $referenceideName Nombre dinámico del campo de referencia en la base de datos.
     * @return void
     */
    public function configure(string $tableName, string $primaryKeyName, string $referenceideName)
    {
        $this->table = $tableName;
        $this->primaryKey = $primaryKeyName;

        // Guardar el nombre dinámico del campo de referencia.
        $this->referenceFieldName = $referenceideName;
    }

    /**
     * Asigna un valor al campo de referencia dinámico.
     *
     * @param mixed $value Valor a asignar al campo de referencia.
     */
    public function setReferenceFieldValue($value)
    {
        $this->attributes[$this->referenceFieldName] = $value;
    }

    /**
     * Obtiene el valor del campo de referencia dinámico.
     *
     * @return mixed Valor del campo de referencia.
     */
    public function getReferenceFieldValue()
    {
        return $this->attributes[$this->referenceFieldName] ?? null;
    }
}
