<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vacantes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 255);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('salario_id')->constrained()->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            /* $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('salario_id');
            $table->unsignedBigInteger('categoria_id'); */
            $table->string('empresa', 100);
            $table->date('ultimo_dia');
            $table->text('descripcion');
            $table->string('imagen');
            $table->integer('publicado')->default(1);
            $table->timestamps();

            /* $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('salario_id')->references('id')->on('salarios');
            $table->foreign('categoria_id')->references('id')->on('categorias'); */
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vacantes');
    }
};
