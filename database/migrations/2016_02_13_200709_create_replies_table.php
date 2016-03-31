<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned()->comment('所属公众号ID');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->enum('type', [
                'subscribe',
                'default',
                'keywords',
            ])->comment('回复类型 subscribe 关注回复 default 默认回复 keywords 关键词回复');
            $table->string('name', 30)->nullable()->comment('规则名称'); //标题
            $table->string('keywords', 500)->nullable()->comment('触发文字');
            $table->string('content')->nullable()->comment('触发内容 events');
            $table->string('group_ids')->nullable()->comment('适用范围：组id数组');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('replies');
    }
}
