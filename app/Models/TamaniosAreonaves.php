<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TamaniosAreonaves extends Model
{
    use HasFactory;

    protected $table="tamanio_aereonave";
    public $timestamps = false;


    protected $fillable = [
        'id',
        'descripcion',
        'nivel_prioridad',
    ];
}
