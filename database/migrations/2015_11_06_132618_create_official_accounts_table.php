<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficialAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('official_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('token', 20)->unique();
            $table->integer('owner_id');
            $table->string('name', 25);
            $table->tinyInteger('type');
            $table->char('appid', 18);
            $table->char('appsecret', 33);
            $table->char('encodingaeskey', 44);
            $table->softDeletes();
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
        Schema::drop('official_accounts');
    }
}
