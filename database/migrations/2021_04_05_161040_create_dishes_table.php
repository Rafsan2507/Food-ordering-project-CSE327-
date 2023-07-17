<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->bigIncrements('dish_id');
            $table->foreignId('category_id');
            $table->string('dish_name');
            $table->longText('dish_detail');
            $table->text('dish_image');
            $table->integer('dish_status');
            $table->timestamps();
        });
    /*    Schema::table('dishes',function ($table){
            $table->integer('price');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishes');
    }
}
