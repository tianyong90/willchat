<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * 备注防止忘记 :
     *
     * 设计中所有的 media_id 将被替换为事件
     */

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->comment('所属公众号');
            $table->integer('parent_id')->nullable()->default(0)->comment('菜单父id');
            $table->string('name', 30)->comment('菜单名称');
            $table->enum('type', [
                'click',
                'view',
                'scancode_push',
                'scancode_waitmsg',
                'pic_sysphoto',
                'pic_photo_or_album',
                'pic_weixin',
                'location_select',
                'media_id',
                'view_limited',
            ])->default('click')->comment('菜单类型');
            $table->string('key', 200)->nullable()->comment('菜单触发值');
            $table->string('media_id', 50)->nullable()->comment('图片或图文消息media_id');
            $table->tinyInteger('sort')->nullable()->default(0)->comment('排序');
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
        Schema::drop('menus');
    }
}
