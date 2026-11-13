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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email', 50)->unique();
            $table->string('password', 255)->nullable()->default(null);
            $table->integer('id_company')->default(0)->index(); // ID da empresa
            $table->enum('role', ['sys-admin', 'client-admin', 'client-user'])->default('client-user');
            $table->dateTime('last_login')->nullable()->default(null); // Último login
            $table->string('code', 64)->nullable()->default(null); // Código de acesso
            $table->dateTime('code_expiration')->nullable()->default(null); // Data de expiração do código
            $table->boolean('active')->default(false); // Usuário ativo
            $table->dateTime('blocked_until')->nullable()->default(null); // Data de bloqueio

            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->dateTime('deleted_at')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
