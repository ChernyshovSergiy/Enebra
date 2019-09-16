<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialLinksTable extends Migration
{
    public function up(): void
    {
        Schema::create('social_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('is_active')->default(0);
            $table->json('url')->nullable();
            $table->integer('sort');
            $table->unsignedBigInteger('image_id')->nullable();
        });
        Schema::table('social_links', function (Blueprint $table) {
            $table->foreign('image_id')->references('id')
                ->on('images');
        });
    }

    public function down(): void
    {
        Schema::table('social_links', function (Blueprint $table) {
            $table->dropForeign(['image_id']);
        });
        Schema::dropIfExists('social_links');
    }
}
