<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescriptionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('descriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->json('content')->nullable();
            $table->unsignedInteger('desc_block_id');
            $table->unsignedBigInteger('image_id')->nullable();
            $table->boolean('shadow')->default(0);
            $table->unsignedBigInteger('in_image_id_1')->nullable();
            $table->unsignedBigInteger('in_image_id_2')->nullable();
            $table->integer('sort');
        });

        Schema::table('descriptions', function (Blueprint $table) {
            $table->foreign('desc_block_id')->references('id')
                ->on('desc_blocks');
            $table->foreign('image_id')->references('id')
                ->on('images');
            $table->foreign('in_image_id_1')->references('id')
                ->on('images');
            $table->foreign('in_image_id_2')->references('id')
                ->on('images');
        });
    }

    public function down(): void
    {
        Schema::table('descriptions', function (Blueprint $table) {
            $table->dropForeign(['desc_block_id']);
            $table->dropForeign(['image_id']);
            $table->dropForeign(['in_image_id_1']);
            $table->dropForeign(['in_image_id_2']);
        });

        Schema::dropIfExists('descriptions');
    }
}
