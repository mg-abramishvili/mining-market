<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroesTable extends Migration
{
    public function up()
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('list_item_1')->nullable();
            $table->string('list_item_2')->nullable();
            $table->string('list_item_3')->nullable();
            $table->string('list_item_4')->nullable();
            $table->string('list_item_5')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('heroes');
    }
}
