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
        Schema::create('card_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('card_id')->constrained('game_cards');
            $table->foreignId('game_session_id')->constrained('game_sessions');
            $table->boolean('active')->default(false);
            $table->boolean('hidden')->default(false);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_sessions');
    }
};
