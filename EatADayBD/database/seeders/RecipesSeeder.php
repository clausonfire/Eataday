<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('recipes')->insert([
            'title' => 'Macarrones con tomate',
            'photo' => 'null',
            'ingredients' => "['macarrones', 'tomate', 'aceite', 'sal']",
            'displayIngredients' => "['1 rebanadad de pan1', 'Un tomate maduro3', 'Un pellizco de sal5', 'Una cabeza de ajo4']",
            'preparation' => 'Hervir la pasta al gusto y echar tomate'
        ]);

        DB::table('recipes')->insert([
            'title' => 'Arroz y conejo',
            'photo' => 'null',
            'ingredients' => "['arroz', 'conejo', 'sal', 'agua', 'aceite', 'sal']",
            'displayIngredients' => "['1 rebanadad de pan3', 'Un tomate maduro3', 'Un pellizco de sal2', 'Una cabeza de ajo1']",
            'preparation' => 'Freir el conejo, añadir agua y arroz'
        ]);

        DB::table('recipes')->insert([
            'title' => 'Pantumaka',
            'photo' => 'null',
            'ingredients' => "['tomate', 'pan', 'sal', 'ajo']",
            'displayIngredients' => "['1 rebanadad de pan', 'Un tomate maduro', 'Un pellizco de sal', 'Una cabeza de ajo']",
            'preparation' => 'Restregar el tomate encima del pan y a al ataque'
        ]);
    }
}
