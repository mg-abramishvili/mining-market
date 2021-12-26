<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvantagesTable extends Migration
{
    public function up()
    {
        Schema::create('advantages', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('advantages');
    }
}
