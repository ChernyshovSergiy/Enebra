<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration
{
    public function up(): void
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('statuses');
    }
}
