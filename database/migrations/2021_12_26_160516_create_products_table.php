<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price');
            $table->text('description')->nullable();
            $table->text('gallery')->nullable();
            $table->string('artikul')->nullable();
            $table->string('proizvoditel')->nullable();
            $table->string('graficheskiy_processor')->nullable();
            $table->string('znacheniya_heshreyta')->nullable();
            $table->string('algoritm_heshirovaniya')->nullable();
            $table->string('potreblenie')->nullable();
            $table->string('energoeffektivnost_w_mh')->nullable();
            $table->string('stoimost_1_mhs_rub.')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
