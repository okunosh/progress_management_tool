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
        Schema::table('tasks', function (Blueprint $table) {
            if (Schema::hasColumn('tasks', 'status')) {
                $table->dropColumn('status');
            }
            if (!Schema::hasColumn('tasks', 'status_category_id')) {
                $table->foreignId('status_category_id')
                      ->constrained('task_status_categories')
                      ->default(1);
            }
        });
        DB::table('tasks')->update(['status_category_id' => 1]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['status_category_id']);
            $table->dropColumn(['status_category_id']);
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
        });
    }
};
