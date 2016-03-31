<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFanGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fan_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned()->comment('所属公众号');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->string('name', 20)->comment('分组名称');
            $table->integer('group_id')->default(0)->comment('分组id');
            $table->integer('count')->default(0)->comment('粉丝数量');
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
        Schema::drop('fan_groups');
    }
}
