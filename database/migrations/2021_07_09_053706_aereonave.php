<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Aereonave extends Migration
{
    private $table_name="aereonave";
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integerIncrements('id');
            $table->string('descripcion', 100);
            $table->string('caracteristicas',100);
            $table->dateTime('dtcreated');
            $table->integer("id_tipo_aereonave",false,true);
            $table->integer("id_tamanio_aereonave",false,true);
            $table->foreign("id_tipo_aereonave")->references("id")->on("tipo_aereonave");
            $table->foreign("id_tamanio_aereonave")->references("id")->on("tamanio_aereonave");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table_name);
    }
}
