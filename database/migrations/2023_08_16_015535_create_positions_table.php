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
        Schema::create('positions', function (Blueprint $table) {
            $table->smallIncrements("id")->comment("Identificador único do cargo do funcionário");
            $table->string("name", 45)->comment("Nome do cargo do funcionário");
            $table->string("description", 1000)->nullable()->comment("Descrição do cargo do funcionário");
            $table->string('slug', 45)->comment('Slug da descrição do cargo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
