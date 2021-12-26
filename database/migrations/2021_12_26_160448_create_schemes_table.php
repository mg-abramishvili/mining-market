<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchemesTable extends Migration
{
    public function up()
    {
        Schema::create('schemes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('text');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('schemes');
    }
}
