<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcadors', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('enlace');
            $table->string('image');
            $table->string('descripcion');

            $table->foreignId('categoria_id')->nullable()->constrained('categorias')->onDelete('cascade');
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
        Schema::dropIfExists('marcadors');
    }
};
