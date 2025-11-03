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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['income', 'expense'])->default('expense');
            $table->string('category')->nullable(); // e.g., 'Office Equipment', 'Maintenance', 'Sales'
            $table->string('description');
            $table->decimal('amount', 15, 2);
            $table->date('transaction_date');
            $table->string('reference_number')->nullable(); // Invoice/receipt number
            $table->string('vendor_customer')->nullable(); // Who we paid/received from
            $table->enum('payment_method', ['cash', 'bank_transfer', 'credit_card', 'check'])->default('bank_transfer');
            $table->text('notes')->nullable();
            $table->string('attachment')->nullable(); // Receipt/invoice file
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
