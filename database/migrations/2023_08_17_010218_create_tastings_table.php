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
        Schema::create('tasting', function (Blueprint $table) {
            $table->unsignedBigInteger("employee_id")->comment("Referência ao identificador único do degustador");
            $table->foreign("employee_id")->references("id")->on("employees")->onDelete("cascade")->onUpdate("cascade");

            $table->unsignedInteger("revenue_id")->comment("Referência ao identificador único da receita");
            $table->foreign("revenue_id")->references("id")->on("revenues")->onDelete("cascade")->onUpdate("cascade");

            $table->unsignedBigInteger("revenue_chef_id")->comment("Referência ao identificador único do cozinheiro da receita");
            $table->foreign("revenue_chef_id")->references("chef_id")->on("revenues")->onDelete("cascade")->onUpdate("cascade");

            $table->primary(["employee_id", "revenue_id", "revenue_chef_id"]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasting');
    }
};
