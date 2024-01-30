<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        DB::table('games')->insert([
            ['name' => 'Dogs', 'image' => 'https://www.deliciouslycleaneats.com.au/wp-content/uploads/2018/08/Meal-Plan-Spread1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Meals', 'image' => 'https://www.deliciouslycleaneats.com.au/wp-content/uploads/2018/08/Meal-Plan-Spread1.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('games')->whereIn('name', ['Dogs', 'Meals'])->delete();
    }
};
