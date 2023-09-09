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
        Schema::create('logins', function (Blueprint $table) {
            $table->bigIncrements("id")->comment("Atributo identificador único do login");
            $table->string('email', 255)->comment("E-mail do usuário")->unique();
            $table->dateTime('email_verified_at')->nullable()->comment("Data que o e-mail foi verificado")->nullable();
            $table->string('password')->comment("Hash da senha do usuário");
            $table->rememberToken()->comment("Token 'Lembra-me'")->nullable();
            $table->boolean("status")->default(true)->comment("Status do login do funcionário");

            $table->unsignedBigInteger("employee_id")->comment("Referência ao identificador único do funcionário");
            $table->foreign("employee_id")->references("id")->on("employees")->onDelete("restrict")->onUpdate("cascade");

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logins');
    }
};
