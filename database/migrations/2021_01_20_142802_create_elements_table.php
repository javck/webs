<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elements', function (Blueprint $table) {
            $table->id();
            $table->string('page', 20); //頁面
            $table->string('title', 40); //標題
            $table->string('position', 20); //位置
            $table->string('icon', 40)->nullable(); //圖示
            $table->string('subtitle', 80)->nullable(); //副標題
            $table->string('content', 2000)->nullable(); //內容
            $table->string('url', 255)->nullable(); //網址
            $table->string('url_txt', 100)->nullable(); //網址文字
            $table->string('pic', 255)->nullable(); //圖片
            $table->string('video', 255)->nullable(); //影片網址
            $table->string('alt', 100)->nullable(); //替代文字
            $table->integer('sort')->default(0); //排序
            $table->boolean('enabled')->default(true); //是否啟用
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
        Schema::drop('elements');
    }
}
