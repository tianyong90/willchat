<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatformParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platform_parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('app_id', 20)->nullable()->content('app_id');
            $table->string('app_secret', 50)->nullable()->content('app_secret');
            $table->string('access_token', 50)->nullable()->content('平台自身的accessToken');
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
        Schema::drop('platform_parameters');
    }
}
