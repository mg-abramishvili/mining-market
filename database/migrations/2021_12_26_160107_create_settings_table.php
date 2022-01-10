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
            $table->string('email_for_notifications')->nullable();
            $table->string('address')->nullable();
            $table->string('logo');
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('vk')->nullable();
            $table->string('seo_title');
            $table->string('seo_description');
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
