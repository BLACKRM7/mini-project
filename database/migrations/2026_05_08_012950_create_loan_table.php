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
            $table->user_id();
            $table->pc_id();
            $table->borrowed_at();
            $table->returned_at();
            $table->status();
            $table->enum('status', [
                'active',
                'inactive',
                'maintenance',
                'borrowed'
            ])->default('inactive');
            $table->timestamps('last_seen_at')->nullable
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
