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
        Schema::create('queue_tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('id_queue')->index(); // ID da fila
            $table->integer('queue_ticket_number')->nullable()->default(null); // Número da senha repetivel depois da 'volta completa' da fila (ex: 001, 002, 003, etc.)
            $table->dateTime('queue_ticket_created_at')->useCurrent(); // Data de criação da senha (gerado pelo sistema)
            $table->dateTime('queue_ticket_called_at')->nullable()->default(null); // Data em que a senha foi chamada
            $table->string('queue_ticket_called_by', 50)->nullable()->default(null); // Quem chamou a senha
            $table->enum('queue_ticket_status', ['waiting', 'called', 'not_attended', 'dismissed'])->default('waiting'); // Status da senha (ativa, inativa, finalizada)

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
        Schema::dropIfExists('queue_tickets');
    }
};
