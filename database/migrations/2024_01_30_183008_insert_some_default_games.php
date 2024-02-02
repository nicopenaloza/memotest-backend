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
            ['name' => 'Dogs', 'image' => 'https://www.akc.org/wp-content/uploads/2018/05/Three-Australian-Shepherd-puppies-sitting-in-a-field.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Meals', 'image' => 'https://www.deliciouslycleaneats.com.au/wp-content/uploads/2018/08/Meal-Plan-Spread1.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('game_cards')->insert([
            ['game_id' => '1', 'image' => 'https://www.akc.org/wp-content/uploads/2018/05/Three-Australian-Shepherd-puppies-sitting-in-a-field.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => '1', 'image' => 'https://cdn.britannica.com/79/232779-050-6B0411D7/German-Shepherd-dog-Alsatian.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => '1', 'image' => 'https://cdn-prod.medicalnewstoday.com/content/images/articles/322/322868/golden-retriever-puppy.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => '1', 'image' => 'https://spca.bc.ca/wp-content/uploads/2023/06/happy-samoyed-dog-outdoors-in-summer-field.jpg', 'created_at' => now(), 'updated_at' => now()],

            ['game_id' => '2', 'image' => 'https://images.immediate.co.uk/production/volatile/sites/30/2022/07/Fajita-style-pasta-f792c52.jpg?quality=90&resize=440,400', 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => '2', 'image' => 'https://www.howsweeteats.com/wp-content/uploads/2020/12/apricot-chicken-6-1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => '2', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNATjOWWrV9BiY3ZLPWwdU8rv7FI_ru8ixYw&usqp=CAU', 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => '2', 'image' => 'https://www.ambitiouskitchen.com/wp-content/uploads/2021/04/One-Pan-Tandoori-Chicken-2.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('games')->whereIn('name', ['Dogs', 'Meals'])->delete();
        DB::table('game_cards')->whereIn('game_id', ['1', '2'])->delete();

        Schema::enableForeignKeyConstraints();
    }
};
