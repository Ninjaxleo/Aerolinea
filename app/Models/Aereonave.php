<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aereonave extends Model
{
    use HasFactory;

    protected $table="aereonave";
    public $timestamps = false;



    protected $fillable = [
        'id',
        'descripcion',
        'dtcreated',
        'caracteristicas',
        'id_tipo_aereonave',
        'id_tamanio_aereonave'
    ];
}
