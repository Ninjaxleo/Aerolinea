<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tamanios_aereonaves extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("tamanio_aereonave")->insert(
            [
                "descripcion"=>"Grande",
                "nivel_prioridad"=>1
            ]
        );
        DB::table("tamanio_aereonave")->insert(
            [
                "descripcion"=>"Chico",
                "nivel_prioridad"=>2
            ]
        );
    }
}
