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
        Schema::create('cookbooks', function (Blueprint $table) {
            $table->integerIncrements('id')->comment('Identificador único livro de receitas');
            $table->string('title', 45)->comment('Nome do livro de receitas');
            $table->char('isbn', 20)->comment('Padrão Internacional de Numeração de Livro');
            $table->unsignedBigInteger('editor_id')->comment('Referência ao identificador único do editor');
            $table->foreign('editor_id')->references('id')->on('employees')->onDelete('restrict')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cookbooks');
    }
};
