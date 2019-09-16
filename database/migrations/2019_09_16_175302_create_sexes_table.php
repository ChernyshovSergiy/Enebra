<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSexesTable extends Migration
{
    public function up(): void
    {
        Schema::create('sexes', function (Blueprint $table) {
            $table->increments('id');
            $table->json('title')->nullable();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('sexes');
    }
}
