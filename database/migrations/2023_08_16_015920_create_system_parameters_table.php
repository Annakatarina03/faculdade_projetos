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
        Schema::create('system_parameters', function (Blueprint $table) {
            $table->smallInteger("month_id")->comment("Mês do ano");
            $table->smallInteger("year_id")->comment("Ano");
            $table->smallInteger("quantity_recipes")->comment("Quantidade de receitas a serem produzidas");

            $table->primary(["month_id", "year_id"]);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_parameters');
    }
};
