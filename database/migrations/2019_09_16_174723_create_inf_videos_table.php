<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfVideosTable extends Migration
{
    public function up(): void
    {
        Schema::create('inf_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->json('info')->nullable();
            $table->unsignedInteger('video_group_id');
            $table->unsignedInteger('video_group_section_id')->nullable();
            $table->integer('sort');
            $table->timestamps();
        });

        Schema::table('inf_videos', function (Blueprint $table) {
            $table->foreign('video_group_id')->references('id')->on('inf_video_groups');
            $table->foreign('video_group_section_id')->references('id')
                ->on('inf_video_group_sections');
        });
    }

    public function down(): void
    {
        Schema::table('inf_videos', function (Blueprint $table) {
            $table->dropForeign(['video_group_id']);
            $table->dropForeign(['video_group_section_id']);
        });
        Schema::dropIfExists('inf_videos');
    }
}
