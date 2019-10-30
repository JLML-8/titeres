<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_evento');
            $table->string('descripcion');
            $table->$table->boolean('contacto')->default(0);
            $table->timestamps();
        });

        Schema::create('evento_voluntario', function (Blueprint $table) {
            $table->unsignedBigInteger('voluntario_id');
            $table->unsignedBigInteger('evento_id');


            $table->foreign('voluntario_id')
            ->references('id')
            ->on('voluntarios')
            ->onDelete('cascade');

            $table->foreign('evento_id')
            ->references('id')
            ->on('eventos')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evento_voluntario');
        Schema::dropIfExists('eventos');

    }
}
