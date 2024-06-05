<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cubriciones', function (Blueprint $table) {
            $table->bigIncrements('id_cubricion');
            $table->bigInteger('id_cerda')->unsigned()->nullable(false);
            $table->date('fecha_cubricion')->nullable(false);
            $table->enum('estado', ['vacia', 'repetida', 'aborto', 'sucia', ''])->nullable(true);
            $table->date('fecha_parto')->nullable(true);
            $table->integer('nacidos_vivos')->nullable(true);
            $table->integer('nacidos_muertos')->nullable(true);
            $table->integer('nacidos_momificados')->nullable(true);
            $table->integer('num_adoptados')->nullable(true);
            $table->integer('num_cedidos')->nullable(true);
            $table->integer('num_bajas')->nullable(true);
            $table->date('fecha_destete')->nullable(true);
            $table->integer('num_destetados')->nullable(true);
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cubriciones');
    }
};
