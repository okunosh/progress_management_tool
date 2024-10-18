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
        Schema::create('long_term_goals', function (Blueprint $table) {
            $table->id('long_term_goal_id');
            $table->foreignId('user_id')->constrained('users', 'user_id');
            $table->string('goal_name');
            $table->text('goal_description')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedTinyInteger('progress_rate')->default(0);
            $table->boolean('goal_visibility')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('long_term_goals');
    }
};
