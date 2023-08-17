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
        Schema::create('restaurants_employees', function (Blueprint $table) {
            $table->unsignedBigInteger("employee_id")->comment("Referência ao identificador único do funcionário");
            $table->foreign("employee_id")->references("id")->on("employees")->onDelete("cascade")->onUpdate("cascade");

            $table->unsignedInteger("restaurant_id")->comment("Referência ao identificador único do restaurante");
            $table->foreign("restaurant_id")->references("id")->on("restaurants")->onDelete("cascade")->onUpdate("cascade");

            $table->date("date_entry")->comment("Data de admissão do funcionário em determinado restaurante");
            $table->date("resignation_date")->nullable()->comment("Data de demissão do funcionário em determinado restaurante");

            $table->primary(["employee_id", "restaurant_id"]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants_employees');
    }
};
