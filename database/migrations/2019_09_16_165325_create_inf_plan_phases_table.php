<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfPlanPhasesTable extends Migration
{
    public function up(): void
    {
        Schema::create('inf_plan_phases', function (Blueprint $table) {
            $table->increments('id');
            $table->json('title')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inf_plan_phases');
    }
}
