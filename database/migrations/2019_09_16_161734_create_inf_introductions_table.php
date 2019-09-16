<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfIntroductionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('inf_introductions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('title_id');
            $table->json('content')->nullable();
        });
        Schema::table('inf_introductions', function (Blueprint $table) {
            $table->foreign('title_id')->references('id')
                ->on('menus');
        });
    }

    public function down(): void
    {
        Schema::table('inf_introductions', function (Blueprint $table) {
            $table->dropForeign(['title_id']);
        });
        Schema::dropIfExists('inf_introductions');
    }
}
