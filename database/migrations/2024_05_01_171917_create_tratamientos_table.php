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
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->id('id_tratamiento');
            $table->foreignId('id_medicamento')->nullable()->constrained('medicamentos')->nullOnDelete();
            $table->foreignId('id_cerda')->constrained('fichas_cerdas', 'id_cerda')->onDelete('cascade');;
            $table->dateTime('fecha_comienzo');
            $table->dateTime('fecha_conclusion')->nullable();
            $table->string('enfermedad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tratamientos');
    }
};
