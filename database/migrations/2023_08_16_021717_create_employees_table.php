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
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements("id")->comment("Identificador único do funcionário");
            $table->string("name", 45)->comment("Nome do funcionário");
            $table->char("cpf", 11)->comment("CPF do funcionário");
            $table->string("fantasy_name", 45)->nullable()->comment("Nome fantasia do funcionário");
            $table->date("date_entry")->comment("Data de admissão do funcionário");
            $table->decimal("wage", 9, 2)->comment("Salário do funcionário");

            $table->unsignedSmallInteger("office_id")->comment("Referência ao identificador único do cargo do funcionário");
            $table->foreign("office_id")->references("id")->on("positions")->onDelete("restrict")->onUpdate("cascade");

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
