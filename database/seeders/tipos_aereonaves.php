<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tipos_aereonaves extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("tipo_aereonave")->insert(
            [
                "descripcion"=>"Emergencia",
                "nivel_prioridad"=>1
            ]
        );
        DB::table("tipo_aereonave")->insert(
            [
                "descripcion"=>"VIP",
                "nivel_prioridad"=>2
            ]
        );
        DB::table("tipo_aereonave")->insert(
            [
                "descripcion"=>"Pasajero",
                "nivel_prioridad"=>3
            ]
        );
        DB::table("tipo_aereonave")->insert(
            [
                "descripcion"=>"Cargo",
                "nivel_prioridad"=>4
            ]
        );
    }
}
