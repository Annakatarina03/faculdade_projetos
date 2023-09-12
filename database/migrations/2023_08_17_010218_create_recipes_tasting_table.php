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
        Schema::create('recipes_tasting', function (Blueprint $table) {
            $table->unsignedBigInteger('taster_id')->comment('Referência ao identificador único do degustador');
            $table->foreign('taster_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('revenue_id')->comment('Referência ao identificador único do cozinheiro da receita');
            $table->foreign('revenue_id')->references('id')->on('revenues')->onDelete('cascade')->onUpdate('cascade');

            $table->date('tasting_date')->nullable()->comment('Data da degustação da receita');
            $table->float('tasting_note', 3, 1)->nullable()->comment('Nota da degustação da receita');

            $table->primary(['taster_id', 'revenue_id']);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes_tasting');
    }
};
