<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposAereonaves extends Model
{
    use HasFactory;
    protected $table="tipo_aereonave";
    public $timestamps = false;



    protected $fillable = [
        'id',
        'descripcion',
        'nivel_prioridad',
    ];

}
