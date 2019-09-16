<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryIdDocumentsTable extends Migration
{
    public function up(): void
    {
        Schema::create('country_id_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->char('country_alpha2_code', 2);
            $table->unsignedInteger('document_id');
        });
        Schema::table('country_id_documents', function (Blueprint $table) {
            $table->foreign('document_id')->references('id')
                ->on('inf_id_documents');
        });
    }

    public function down(): void
    {
        Schema::table('country_id_documents', function (Blueprint $table) {
            $table->dropForeign(['document_id']);
        });
        Schema::dropIfExists('country_id_documents');
    }
}
