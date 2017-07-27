<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('account_id')->nullable()->comment('所属公众号ID');
            $table->string('media_id', 50)->nullable()->commone('media_id');
            $table->enum('type', ['image', 'voice', 'video', 'thumb', 'article'])->nullable()->commone('素材类型');
            $table->string('url', 255)->nullable()->commone('对应url');
            $table->string('name', 100)->nullable()->commone('素材标题');
            $table->string('description', 60)->nullable()->commone('素材说明');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('account_id')->references('id')->on('accounts')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materials');
    }
}
