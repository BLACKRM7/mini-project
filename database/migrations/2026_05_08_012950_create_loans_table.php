<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loan', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('user_id')
            ->constrained()
            ->cascadeOnDelete();
            
            $table->foreignId('pc_id')
            ->constrained()
            ->cascadeOnDelete();
            
            $table->timestamp('borrowed_at');
            $table->timestamp('returned_at')->nullable();
            
            $table->enum('status', [
                'borrowed',
                'returned',
                'overdue',
            ])->default('borrowing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan');
    }
};
