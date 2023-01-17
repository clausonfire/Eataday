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
        //comentario
        // $table->id();
        // $table->string('name', 32)->unique();
        // $table->string('photo', 200)->unique();//photo
        // $table->float('price', 10, 2)->nullable();
        // $table->float('price_k', 10, 2)->nullable();
        // $table->timestamps();

        DB::table('ingredients')->insert([
            'name'=> 'Atun',
            'photo' => "https://dam.cocinafacil.com.mx/wp-content/uploads/2018/07/beneficios-del-atun-1.jpg",
            'price' => 2.5,
            'price_k' => 3.5
        ]);

        DB::table('ingredients')->insert([
            'name'=> 'Lechuga',
            'photo' => "https://statics-cuidateplus.marca.com/cms/styles/natural/azblob/lechuga.jpg.webp?itok=kvw7kO2D",
            'price' => 1.5,
            'price_k' => 2.5
        ]);
    }
}
