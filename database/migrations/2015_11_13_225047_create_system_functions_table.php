<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_functions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->string('description', 50);
            $table->string('method', 20);
            $table->char('is_open', 1);
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
        Schema::drop('system_functions');
    }
}
