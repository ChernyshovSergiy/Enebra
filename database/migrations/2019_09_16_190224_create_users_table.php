<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('parent_referral_id')->nullable();
            $table->char('citizen_country_alpha2_code', 2)->nullable();
            $table->unsignedBigInteger('biometric_photo_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('first_name_en')->nullable();
            $table->string('last_name_en')->nullable();
            $table->unsignedInteger('sex_id')->nullable();
            $table->char('birth_country_alpha2_code', 2)->nullable();
            $table->unsignedInteger('document_id')->nullable();
            $table->string('document_number')->nullable();
            $table->integer('birth_day')->nullable();
            $table->integer('birth_month')->nullable();
            $table->year('birth_year')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('login')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('avatar_id')->nullable();
            $table->rememberToken();
            $table->string('status')->default('0000000000');
            $table->string('referral_id')->unique();
            $table->unsignedInteger('language_id')->default(1);
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('biometric_photo_id')->references('id')->on('images');
            $table->foreign('sex_id')->references('id')->on('sexes');
            $table->foreign('document_id')->references('id')->on('inf_id_documents');
            $table->foreign('avatar_id')->references('id')->on('images');
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['biometric_photo_id']);
            $table->dropForeign(['sex_id']);
            $table->dropForeign(['document_id']);
            $table->dropForeign(['avatar_id']);
            $table->dropForeign(['language_id']);
        });
        Schema::dropIfExists('users');
    }
}
