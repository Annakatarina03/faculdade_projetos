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
        Schema::create('revenues', function (Blueprint $table) {
            $table->uuid("id")->unique()->comment("Identificador único da receita");

            $table->string("name", 45)->comment("Nome da receita");

            $table->unsignedBigInteger("chef_id")->comment("Referência ao identificador único do cozinheiro");
            $table->foreign("chef_id")->references("id")->on("employees")->onDelete("cascade")->onUpdate("cascade");

            $table->foreignId("category_id")->nullable()->comment("Referência ao identificador único da categoria da receita");

            $table->date("creation_date")->nullable()->comment("Data de criação da receita");
            $table->string("method_preparation", 1000)->comment("Modo de preparo da receita");
            $table->smallInteger("number_servings")->nullable()->comment("Número de porções da receita");
            $table->boolean("unpublished_recipe")->comment("A receita é inédita?");

            $table->unsignedInteger("image_id")->nullable()->comment("Referência ao identificador único da imagem da receita");
            $table->foreign("image_id")->references("id")->on("images")->onDelete("set null")->onUpdate("cascade");

            $table->timestamps();

            $table->primary(["name", "chef_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revenues');
    }
};
