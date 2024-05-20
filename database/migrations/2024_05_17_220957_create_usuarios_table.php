<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->date('fecha_nacimiento')->nullable();
            $table->timestamp('fecha_registro')->nullable();
            $table->string('sexo')->nullable();
            $table->boolean('status')->default(0); // Modificado para permitir valores nulos
            $table->boolean('privado')->default(0);;
            $table->boolean('admin')->default(0);;
            $table->string('avatar')->nullable();
            $table->unsignedBigInteger('carrera_id')->nullable(); // Nombre de la columna de la clave foránea
            $table->text('biografia')->nullable();
            $table->timestamps();

            // Definir la restricción de clave foránea
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
