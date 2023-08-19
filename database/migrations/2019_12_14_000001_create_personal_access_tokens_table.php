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
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->bigIncrements("id")->comment("Identificador do token de acesso");
            $table->morphs('tokenable');
            $table->string('name')->comment("Nome descritivo do token");
            $table->string('token', 64)->unique()->comment("Valor do token de acesso pessoal");
            $table->text('abilities')->nullable()->comment("Abilidades (abilities) associadas ao token");
            $table->timestamp('last_used_at')->nullable()->comment("Registro, a data e a hora da última vez que o token foi usado");
            $table->timestamp('expires_at')->nullable()->comment("Data da expiração do token");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
