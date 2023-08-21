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
        Schema::create('publications', function (Blueprint $table) {

            $table->unsignedInteger("cookbook_id")->comment("Referência ao identificador único do livro de receitas");
            $table->foreign("cookbook_id")->references("id")->on("cookbooks")->onDelete("cascade")->onUpdate("cascade");

            $table->unsignedBigInteger("revenue_id")->comment("Referência ao identificador da receita");
            $table->foreign("revenue_id")->references("id")->on("revenues")->onDelete("cascade")->onUpdate("cascade");

            $table->primary(["cookbook_id", "revenue_id"]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
