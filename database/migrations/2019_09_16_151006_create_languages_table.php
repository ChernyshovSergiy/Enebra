<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    public function up(): void
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_active')->default(0);
            $table->char('slug', 2);
            $table->char('flag_country', 2);
            $table->string('title');
            $table->string('localization');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
}
