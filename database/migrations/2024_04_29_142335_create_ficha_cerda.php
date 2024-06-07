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
        Schema::create('fichas_cerdas', function (Blueprint $table) {
            $table->bigIncrements('id_cerda');
            $table->foreignId('id_nave')->nullable()->constrained('naves', 'id_nave')->nullOnDelete();
            $table->string("nfc");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichas_cerdas');
    }
};
