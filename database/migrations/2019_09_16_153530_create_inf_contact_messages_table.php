<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfContactMessagesTable extends Migration
{
    public function up(): void
    {
        Schema::create('inf_contact_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('message');
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('language_id')->default(1);
            $table->timestamps();
        });
        Schema::table('inf_contact_messages', function (Blueprint $table) {
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    public function down(): void
    {
        Schema::table('inf_contact_messages', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropForeign(['language_id']);
        });
        Schema::dropIfExists('inf_contact_messages');
    }
}
