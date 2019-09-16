<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfIntroductionPoints extends Migration
{
    public function up(): void
    {
        Schema::create('inf_introduction_points', function (Blueprint $table) {
            $table->increments('id');
            $table->json('point')->nullable();
            $table->unsignedInteger('link_id');
            $table->integer('sort');
        });
        Schema::table('inf_introduction_points', function (Blueprint $table) {
            $table->foreign('link_id')->references('id')->on('menus');
        });
    }

    public function down(): void
    {
        Schema::table('inf_introduction_points', function (Blueprint $table) {
            $table->dropForeign(['link_id']);
        });
        Schema::dropIfExists('inf_introduction_points');
    }
}
