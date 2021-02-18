<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitantes', function (Blueprint $table) {
            $table->id();
            $table->string('Cedula')->unique()->nullable();
            $table->string('fecha')->nullable();
            $table->string('name')->nullable();
            $table->string('apellido')->nullable();
            $table->string('direccion')->nullable();
            $table->double('cel')->nullable();
            $table->string('departamento')->nullable();
            $table->string('municipio')->nullable();
            $table->string('foto')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitantes');
    }
}
