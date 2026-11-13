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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 100)->nullable(); // Nome da empresa
            $table->string('company_logo', 255)->nullable(); // Logo da empresa
            $table->uuid('uuid')->unique(); // UUID da empresa
            $table->string('address', 255)->nullable(); // Endereço da empresa
            $table->string('phone', 20)->nullable(); // Telefone da empresa
            $table->string('email', 100)->nullable(); // Email da empresa
            $table->enum('role', ['active', 'inactive'])->default('active'); // Empresa ativa ou inativa

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
        Schema::dropIfExists('companies');
    }
};
