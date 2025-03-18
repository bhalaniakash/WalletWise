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
        Schema::create('expense_controllers', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Reference to users table
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Reference to categories table
            $table->string('expense_name'); // Name of the expense
            $table->decimal('amount', 10, 2); // Amount with 2 decimal places
            $table->date('date'); // Expense date
            $table->string('payment_method'); // Payment method (cash, card, etc.)
            $table->text('description')->nullable(); // Optional description
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expense_controllers');
    }
};
