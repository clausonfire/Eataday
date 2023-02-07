<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supermarket_ingredient', function (Blueprint $table) {
        //     $table->integer('supermarket_id')->unsigned();
        //     $table->integer('ingredient_id')->unsigned();
        //     $table->foreignId('supermarket_id')
        //         ->references('id')
        //         ->on('supermarket')
        //         ->onDelete('cascade');

        //     $table->foreignId('ingredient_id')
        //         ->references('id')
        //         ->on('ingredient')
        //         ->onDelete('cascade');
        
        $table->foreignId('supermarket_id')->references('id')->on('supermarkets')->onDelete('cascade')->onUpdate('cascade');
        $table->foreignId('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade')->onUpdate('cascade');
    
    });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supermarket_ingredients');
    }
};
