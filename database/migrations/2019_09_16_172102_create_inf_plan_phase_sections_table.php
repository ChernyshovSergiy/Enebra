<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfPlanPhaseSectionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('inf_plan_phase_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->json('sub_title');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inf_plan_phase_sections');
    }
}
