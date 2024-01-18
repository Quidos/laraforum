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
        Schema::table('threads', function ($table) {
            $table->renameColumn('category', 'category_id');
        });
        Schema::table('threads', function ($table) {
            $table->renameColumn('author', 'user_id');
        });
        Schema::table('posts', function ($table) {
            $table->renameColumn('topic', 'topic_id');
        });
        Schema::table('posts', function ($table) {
            $table->renameColumn('author', 'user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
