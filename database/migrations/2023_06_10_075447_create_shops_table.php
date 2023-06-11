<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name'); // ニュースのタイトルを保存するカラム
            $table->string('image_path')->nullable();  // 画像のパスを保存するカラム
            $table->string('shop_url'); // ニュースのURLを保存するカラム
            $table->string('description');  // ニュースの本文を保存するカラム

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
        Schema::dropIfExists('shops');
    }
};
