<?php

namespace App\Domain\Model;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direccion';
    protected $primaryKey = 'iddireccion';
    public $timestamps = false;

    protected $fillable = [
        'idpersona',
        'descripcion',
        'principal',
        'idestado',
        'idubigeo',
        'idultimaauditoriadireccion'
    ];
}
