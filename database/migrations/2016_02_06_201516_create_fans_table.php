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
            $table->unsignedInteger('account_id')->nullable()->comment('所属公众号');
            $table->string('openid', 50)->default('')->comment('OPENID');
            $table->string('nickname', 50)->default('')->comment('昵称');
            $table->string('remark', 100)->default('')->comment('备注');
            $table->integer('sex')->default(0)->comment('性别');
            $table->string('language', 20)->default('')->comment('语言');
            $table->string('city', 50)->default('')->comment('城市');
            $table->string('province', 50)->default('')->comment('省');
            $table->string('country', 50)->default('')->comment('国家');
            $table->string('headimgurl', 255)->default('')->comment('头像');
            $table->integer('unionid')->nullable()->comment('unionid');
            $table->integer('subscribe')->nullable()->comment('是否已关注');
            $table->integer('liveness')->default(0)->comment('用户活跃度');
            $table->timestamp('subscribe_time')->nullable()->comment('关注时间');
            $table->unsignedInteger('groupid')->default(0)->comment('粉丝组groupid');
            $table->string('tagid_list', 50)->default('')->comment('微信用户标签ID列表');
            $table->timestamp('last_online_at')->nullable()->comment('最后一次在线时间');
            $table->timestamps();

            $table->foreign('account_id')->references('id')->on('accounts')->unUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fans');
    }
}
