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
        Schema::create('recipe_ingredients', function (Blueprint $table) {
            $table->unsignedInteger("ingredient_id")->comment("Referência ao identificador único do ingrediente");
            $table->foreign("ingredient_id")->references("id")->on("ingredients")->onDelete("cascade")->onUpdate("cascade");

            $table->unsignedBigInteger("revenue_id")->comment("Referência ao identificador único do cozinheiro da receita");
            $table->foreign("revenue_id")->references("id")->on("revenues")->onDelete("cascade")->onUpdate("cascade");

            $table->unsignedSmallInteger("measure_id")->nullable()->comment("Referência ao identificador único da medida da receita");
            $table->foreign("measure_id")->references("id")->on("measures")->onDelete("set null")->onUpdate("cascade");

            $table->smallInteger('amount')->comment("Quantidade do ingrediente na receita");

            $table->primary(["ingredient_id", "revenue_id"]);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes_ingredients');
    }
};
