<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->unsignedInteger('user_id')->comment('公众号主人ID');
            $table->string('name', 25)->comment('公众号名称');
            $table->tinyInteger('type')->default(1)->comment('类型');
            $table->char('app_id', 18)->default('')->comment('appid');
            $table->char('app_secret', 33)->default('')->comment('appsecret');
            $table->char('aes_key', 44)->default('')->comment('encodingaeskey');
            $table->char('merchant_id', 10)->default('')->comment('商户号');
            $table->char('merchant_key', 33)->default('')->comment('支付密码');
            $table->string('cert_path', 125)->default('')->comment('商户证书路径');
            $table->string('key_path', 125)->default('')->comment('密钥证书路径');
            $table->string('remark', 100)->default('')->comment('备注');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->unUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
