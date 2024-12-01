<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licencias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('precio', 8, 2);
            $table->integer('almacenamiento');
            $table->text('descripcion')->nullable();
            $table->integer('duracion'); // Duración en meses
            $table->integer('cantidad_usuarios');
            $table->boolean('modulo1')->default(false);
            $table->boolean('modulo2')->default(false);
            $table->boolean('modulo3')->default(false);
            $table->integer('limite_usuarios_clientes');
            $table->integer('limite_clientes');
            $table->integer('limite_almacenamiento');
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
        Schema::dropIfExists('licencias');
    }
}