<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task_status_categories', function (Blueprint $table) {
            $table->id();
            $table->string('status_name')->unique();
            $table->timestamps();
        });

        DB::table('task_status_categories')->insert([
            ['status_name' => 'pending'],
            ['status_name' => 'in_progress'],
            ['status_name' => 'completed'],
        ]);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_status_categories');
    }
};
