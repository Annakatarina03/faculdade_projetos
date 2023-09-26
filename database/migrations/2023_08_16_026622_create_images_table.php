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
        Schema::create('images', function (Blueprint $table) {
            $table->integerIncrements('id')->comment('Identificador único da image da receita');
            $table->string('url', 255)->comment('URL da imagem');
            $table->unsignedBigInteger('revenue_id')->comment('Referência ao identificador único da imagem');
            $table->foreign('revenue_id')->references('id')->on('revenues')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
