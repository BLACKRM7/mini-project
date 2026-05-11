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
        Schema::create('pcs', function (Blueprint $table) {
            $table->id();
            
            $table->code('code')->unique();
            $table->name('name');
            $table->ipAddress('ip_address')->nullable();
            $table->location('location')->nullable();
            $table->status('status', [
                'active',
                'inactive',
                'maintenance',
                'borrowed'
            ])->default('inactive');
            $table->timestamps('last_seen_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pcs');
    }
};
