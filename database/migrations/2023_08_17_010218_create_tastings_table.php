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
        Schema::create('tastings', function (Blueprint $table) {
            $table->unsignedBigInteger("tasting_id")->comment("Referência ao identificador único do degustador");
            $table->foreign("tasting_id")->references("id")->on("employees")->onDelete("cascade")->onUpdate("cascade");

            $table->string("revenue_name", 45)->comment("Referência ao identificador do nome da receita");
            $table->foreign("revenue_name")->references("name")->on("revenues")->onDelete("cascade")->onUpdate("cascade");

            $table->unsignedBigInteger("revenue_chef_id")->comment("Referência ao identificador único do cozinheiro da receita");
            $table->foreign("revenue_chef_id")->references("chef_id")->on("revenues")->onDelete("cascade")->onUpdate("cascade");

            $table->date("tasting_date")->nullable()->comment("Data da degustação da receita");
            $table->smallInteger("tasting_note")->nullable()->comment("Nota da degustação da receita");

            $table->primary(["tasting_id", "revenue_name", "revenue_chef_id"]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tastings');
    }
};
