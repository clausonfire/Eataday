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
            'photo' => '',
            'ingredients' => 'Macarrones, tomate, aceite y sal',
            'preparation' => 'Hervir la pasta al gusto y echar tomate'
        ]);

        DB::table('recipes')->insert([
            'title' => 'Arroz y conejo',
            'photo' => '',
            'ingredients' => 'Arroz, conejo, sal, agua, aceite, sal',
            'preparation' => 'Freir el conejo, añadir agua y arroz'
        ]);

        DB::table('recipes')->insert([
            'title' => 'Pantumaka',
            'photo' => '',
            'ingredients' => '1 tomate de untar maduro, 1 rebanada de pan de tamaño generoso, sal y ajo',
            'preparation' => 'Restregar el tomate encima del pan y a al ataque'
        ]);
    }
}
