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
        Schema::create('work', function (Blueprint $table) {
            $table->id();
            $table->string('page_id')->unique();
            $table->string('title');
            $table->text('content');
            $table->string('image');
            $table->string('category');
            $table->integer('view_encounter');
            $table->string('download_file')->nullable();
            $table->integer('download_encounter');
            $table->string('github_link')->nullable();
            $table->string('web_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work');
    }
};
