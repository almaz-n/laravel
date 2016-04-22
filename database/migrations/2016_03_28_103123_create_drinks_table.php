<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drinks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('name');
            $table->string('manufacture');
            $table->integer('country_id')->unsigned();
            $table->string('provider');
            $table->enum('capacity', array('0.33', '0.5', '0.75', '1.0', '1.5', '2.0'));
            $table->date('madeDate');
            $table->string('image');
            $table->double('price');
            $table->integer('count');
            $table->enum('status', array('в наличии', 'отсутствует', 'в пути'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('drinks');
    }
}
