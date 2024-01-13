<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\ExpensesCategory; 

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('category', ExpensesCategory::ExpensesCategory)->default(ExpensesCategory::flat);;
            $table->decimal('amount'); 
            $table->date('date');
            $table->timestamps();
            $table->foreignId('user_id')->constrained(); 
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
