<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodStuffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_stuffs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->text('desc');
            $table->integer('id_categorie');
            $table->integer('id_partner');
            $table->string('thumbnail', 2048)->nullable();
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
        Schema::dropIfExists('food_stuffs');
    }
}