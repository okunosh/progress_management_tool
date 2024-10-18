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
        Schema::dropIfExists('short_term_goals');
        
        Schema::create('short_term_goals', function (Blueprint $table) {
            $table->id('short_term_goal_id');
            $table->foreignId('long_term_goal_id')->constrained('long_term_goals', 'long_term_goal_id');
            $table->timestamps();
            $table->string('short_term_goal_name');
            $table->text('short_term_goal_description')->nullable();
            $table->date('planned_start_date');
            $table->date('planned_end_date');
            $table->decimal('progress_status', 4, 1);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('short_term_goals');
    }
};
