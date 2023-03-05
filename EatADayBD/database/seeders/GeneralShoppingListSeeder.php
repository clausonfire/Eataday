<?php

namespace Database\Seeders;

use App\Models\GeneralShoppingList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralShoppingListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralShoppingList::create([
            'ingredients'=>'["macarrones", "tomate", "aceite", "sal"]',
            'user_id'=>1
        ]);
        GeneralShoppingList::create([
            'ingredients' => '["arroz", "conejo", "sal", "agua", "aceite", "sal"]',
            'user_id'=>2
        ]);
    }
}
