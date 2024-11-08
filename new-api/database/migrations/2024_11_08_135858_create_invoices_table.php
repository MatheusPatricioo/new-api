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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users'); // relaciona o user_id com o id da tabela users
            $table->string('type'); // ex: P, B, C para pix, boleto, cartao
            $table->boolean('paid'); // indica se foi pago ou não
            $table->decimal('value', 10, 2); // valor com até 10 dígitos e 2 decimais
            $table->dateTime('payment_date')->nullable(); // invoice = fatura :)
            $table->timestamps(); // cria as colunas created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Invoices');
    }
};
