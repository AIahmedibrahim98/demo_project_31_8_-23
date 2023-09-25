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
        Schema::table('tasks', function (Blueprint $table) {
            $table->string('title', 500);
            $table->renameColumn('text_col', 'description');
            $table->text('mobile_col')->change();

            $table->after('id', function (Blueprint $table) {
                $table->date('due_date');
                $table->date('start_date');
                $table->foreignId('user_id')->constrained();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->renameColumn("description", 'text_col');
            $table->char('mobile_col')->change();
            $table->dropColumn(["due_date", "start_date"]);
            $table->dropConstrainedForeignId('user_id');
        });
    }
};
