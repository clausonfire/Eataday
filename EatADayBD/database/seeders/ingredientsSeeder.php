<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ingredient;
use Illuminate\Support\Facades\DB;

class ingredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Ingredient::create([
            'name'=> 'Atun',
            'photo' => "https://dam.cocinafacil.com.mx/wp-content/uploads/2018/07/beneficios-del-atun-1.jpg",
            'price' => 2.5,
            'price_k' => 3.5,
            'user_id'=>2
        ]);

        Ingredient::create([
            'name'=> 'Lechuga',
            'photo' => "https://statics-cuidateplus.marca.com/cms/styles/natural/azblob/lechuga.jpg.webp?itok=kvw7kO2D",
            'price' => 1.5,
            'price_k' => 2.5,
            'user_id' => 3
        ]);
        Ingredient::create([
            'name'=> 'Macarrones',
            'photo' => "no-hay-ruta1",
            'price' => 1.5,
            'price_k' => 2.5,
            'user_id' => 3
        ]);
        Ingredient::create([
            'name'=> 'Tomate',
            'photo' => "no-hay-ruta2",
            'price' => 1.5,
            'price_k' => 2.5,
            'user_id' => 3
        ]);
        Ingredient::create([
            'name'=> 'Aceite',
            'photo' => "no-hay-ruta3",
            'price' => 1.5,
            'price_k' => 2.5,
            'user_id' => 3
        ]);
        Ingredient::create([
            'name'=> 'Conejo',
            'photo' => "no-hay-ruta4",
            'price' => 1.5,
            'price_k' => 2.5,
            'user_id' => 3
        ]);
        Ingredient::create([
            'name'=> 'Arroz',
            'photo' => "no-hay-ruta5",
            'price' => 1.5,
            'price_k' => 2.5,
            'user_id' => 3
        ]);
    }
}
