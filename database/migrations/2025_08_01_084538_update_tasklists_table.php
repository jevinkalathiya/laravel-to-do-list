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
        Schema::table('tasklists', function (Blueprint $table) {
            $table->date('due_date')->default(now())->after('task_name');
            $table->boolean('is_pending')->default(true)->after('due_date');
            $table->boolean('is_in_progress')->default(false)->after('due_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasklists', function (Blueprint $table) {
            //
        });
    }
};
