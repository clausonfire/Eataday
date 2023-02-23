<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Recipe;


class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Recipe::create([
            'title' => 'Macarrones con tomate',
            'photo' => 'null',
            'ingredients' => '["macarrones", "tomate", "aceite", "sal"]',
            'displayIngredients' => '["1 rebanadad de pan1", "Un tomate maduro3", "Un pellizco de sal", "Una cabeza de ajo4"]',
            'preparation' => 'Hervir la pasta al gusto y echar tomate'
        ]);

        Recipe::create([
            'title' => 'Arroz y conejo',
            'photo' => 'null',
            'ingredients' => '["arroz", "conejo", "sal", "agua", "aceite", "sal"]',
            'displayIngredients' => '["1 rebanadad de pan3", "Un tomate maduro3", "Un pellizco de sal2", "Una cabeza de ajo1"]',
            'preparation' => 'Freir el conejo, añadir agua y arroz'
        ]);

        Recipe::create([
            'title' => 'Pantumaka',
            'photo' => 'null',
            'ingredients' => '["tomate", "pan", "sal", "ajo"]',
            'displayIngredients' => '["1 rebanadad de pan", "Un tomate maduro", "Un pellizco de sal", "Una cabeza de ajo"]',
            'preparation' => 'Restregar el tomate encima del pan y a al ataque'
        ]);
    }
}
