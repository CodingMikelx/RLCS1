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
        Schema::table('text', function (Blueprint $table) {
            $table->foreignId('page_id')->references('id')->on('page')->cascadeOnDelete()->nullable();
            $table->foreignId('audio_id')->references('id')->on('audio')->cascadeOnDelete()->nullable();
            $table->foreignId('images_id')->references('id')->on('images')->cascadeOnDelete()->nullable();
        });
        Schema::table('images', function (Blueprint $table) {
            $table->foreignId('text_id')->nullable()->constrained('text')->onDelete('cascade');
        });
        Schema::table('page', function (Blueprint $table) {
            $table->foreignId('story_id')->references('id')->on('story')->cascadeOnDelete()->nullable();
            $table->foreignId('images_id')->references('id')->on('images')->cascadeOnDelete()->nullable();
        });
        Schema::table('interact', function (Blueprint $table) {
            $table->foreignId('page_id')->references('id')->on('page')->cascadeOnDelete()->nullable();
            $table->foreignId('animation_id')->references('id')->on('animation')->cascadeOnDelete()->nullable();
            $table->foreignId('text_id')->references('id')->on('text')->cascadeOnDelete()->nullable();
            $table->foreignId('images_id')->references('id')->on('images')->cascadeOnDelete()->nullable();
            $table->foreignId('interact_event_id')->references('id')->on('interact_event')->cascadeOnDelete()->nullable();
        });
        Schema::table('story', function (Blueprint $table) {
            $table->foreignId('images_id')->references('id')->on('images')->cascadeOnDelete()->nullable();
            $table->foreignId('creator_id')->references('id')->on('creator')->cascadeOnDelete()->nullable();
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
