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
        Schema::create('queues', function (Blueprint $table) {
            $table->id();
            $table->integer('id_company')->index();
            $table->string('name', 100)->nullable()->default(null); // Nome da fila
            $table->string('description', 255)->nullable()->default(null); // Descrição da fila
            $table->string('service_name', 50)->nullable()->default(null); // Nome do serviço (cardiologista, etc.)
            $table->string('service_desk', 20)->nullable()->default(null); // Nome do setor (balcao de atencao da fila)(cardiologista, etc.)
            $table->string('queue_prefix', 10)->nullable()->default(null); // Prefixo da fila (A42 / 123 / B53)
            $table->integer('queue_total_digits')->default(3); // Total de dígitos de uma fila (3 dígitos = 001, 002, 003, etc.)
            $table->string('queue_colors', 255)->nullable(); // Jason com um conjunto de propriedades para cada cor da fila (background, text, border, etc.)
            $table->string('hash_code', 64)->Unique(); // Código unico que identifica a fila (gerado pelo sistema)
            $table->enum('status', ['active', 'inactive', 'done'])->default('inactive'); // Status da fila (ativa, inativa, finalizada)

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
        Schema::dropIfExists('queues');
    }
};
