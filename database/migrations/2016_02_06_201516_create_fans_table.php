<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned()->comment('所属公众号');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->integer('groupid')->comment('粉丝组groupid');
            $table->string('tagid_list', 50)->comment('微信用户标签ID列表');
            $table->string('openid', 50)->nullable()->comment('OPENID');
            $table->string('nickname', 50)->comment('昵称');
            $table->string('signature', 100)->comment('签名');
            $table->text('remark')->comment('备注');
            $table->integer('sex')->comment('性别');
            $table->string('language', 20)->comment('语言');
            $table->string('city', 50)->comment('城市');
            $table->string('province', 50)->comment('省');
            $table->string('country', 50)->comment('国家');
            $table->string('headimgurl', 255)->comment('头像');
            $table->integer('unionid')->nullable()->comment('unionid');
            $table->integer('subscribe')->comment('是否已关注');
            $table->integer('liveness')->default(0)->comment('用户活跃度');
            $table->timestamp('subscribe_time')->nullable()->default('0000-00-00 00:00:00')->comment('关注时间');
            $table->timestamp('last_online_at')->comment('最后一次在线时间');
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
        Schema::drop('fans');
    }
}
