<?php

namespace App\Domain\Model;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{

    protected $table = 'sucursales';

    protected $primaryKey = 'idsucursal';

    protected $fillable = [
        'descripcion',
        'idubigeo',
        'idestado',
        'idultimaauditoriasucursal'
    ];

    public $timestamps = false;
}
