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
            $table->string('sexo')->nullable();
            $table->boolean('status')->default(0); // Modificado para permitir valores nulos
            $table->boolean('privado')->default(0);
            $table->boolean('admin')->default(0);;
            $table->string('avatar')->nullable();
            $table->string('portada')->nullable();
            $table->foreignId('carrera_id')->nullable()->constrained('carreras')->onDelete('cascade');
            $table->text('biografia')->nullable();
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
        Schema::dropIfExists('usuarios');
    }
}
