<?php

namespace App\Domain\Model;

use Illuminate\Database\Eloquent\Model;

class CabeceraGlobal extends Model
{

    protected $table = "cabeceraglobales";
    protected $primaryKey = "idcabeceraglobal";
    public $timestamps = false;
    protected $fillable = [
        "descripcion",
        "nombrevista",
        "idestado",
        "nombrekey",
        "campo1",
        "campo2",
        "campo3",
        "campo4",
        "idtipocorrelativo",
        "idultimaauditoriacabeceraglobal"
    ];
}
