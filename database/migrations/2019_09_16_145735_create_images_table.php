<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->integer('user_id')->nullable();
            $table->string('image');
            $table->unsignedInteger('category_id');
            $table->timestamps();
        });
        Schema::table('images', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('image_categories');
        });
    }

    public function down(): void
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
        Schema::dropIfExists('images');
    }
}
