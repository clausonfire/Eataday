<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'title' => 'No va una mierda1',
            'text' => 'Este es el relleno del mensaje 1',
            'isFrequent' => false,
            'user_id'=>1
        ]);
        DB::table('comments')->insert([
            'title' => 'No va una mierda2',
            'text' => 'Este es el relleno del mensaje 2',
            'isFrequent' => true,
            'user_id'=>4
        ]);
        DB::table('comments')->insert([
            'title' => 'No va una mierda3',
            'text' => 'Este es el relleno del mensaje 3',
            'isFrequent' => false,
            'user_id'=>3
        ]);
    }
}
