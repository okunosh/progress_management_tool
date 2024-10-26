<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('task_id');
            $table->foreignId('short_term_goal_id')->constrained('short_term_goals', 'short_term_goal_id');
            $table->timestamps();
            $table->string('task_name');
            $table->string('task_description')->nullable();
            $table->date('planned_date');
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');//
            $table->date('due_date')->nullable();
            $table->enum('priority_level', ['high','medium', 'low'])->default('medium');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
