<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('tel');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('main_title');
            $table->string('main_list_1')->nullable();
            $table->string('main_list_2')->nullable();
            $table->string('main_list_3')->nullable();
            $table->text('about_text');
            $table->longText('policy');
            $table->string('logo');
            $table->string('logo_2');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
