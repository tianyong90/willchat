<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('token', 20)->unique()->comment('公众号TOKEN');
            $table->integer('user_id')->unsigned()->comment('公众号主人ID');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name', 25)->comment('公众号名称');
            $table->tinyInteger('type')->comment('类型');
            $table->char('app_id', 18)->comment('appid');
            $table->char('app_secret', 33)->comment('appsecret');
            $table->char('aes_key', 44)->comment('encodingaeskey');
            $table->char('merchant_id', 10)->comment('商户号');
            $table->char('key', 33)->comment('支付密码');
            $table->string('cert_path', 125)->comment('商户证书路径');
            $table->string('key_path', 125)->comment('密钥证书路径');
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
        Schema::drop('accounts');
    }
}
