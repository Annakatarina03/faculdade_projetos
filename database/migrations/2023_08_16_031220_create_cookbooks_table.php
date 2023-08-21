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

            $table->integerIncrements("id")->comment("Identificador único livro de receitas");
            $table->string("title", 45)->comment("Nome do livro de receitas");
            $table->char("isbn", 13)->comment("Padrão Internacional de Numeração de Livro (ISBN)");

            $table->unsignedBigInteger("publisher_id")->comment("Referência ao identificador único do editor");
            $table->foreign("publisher_id")->references("id")->on("employees")->onDelete("restrict")->onUpdate("cascade");

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
