<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQrcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qrcodes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned()->comment('所属公众号');
            $table->string('keyword', 125)->nullable()->comment('二维码关键词');
            $table->string('remark', 50)->default('')->comment('备注');
            $table->string('ticket', 100)->default('')->comment('二维码 TICKET');
            $table->enum('type', [
                'forever',
                'temporary',
                'card',
            ])->default('forever')->comment('二维码类型');
            $table->unsignedInteger('scaned_times')->default(0)->comment('被扫次数');
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('qrcodes');
    }
}
