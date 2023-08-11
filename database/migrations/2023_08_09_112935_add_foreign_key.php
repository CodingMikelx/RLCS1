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
            $table->foreignId('page_id')->references('id')->on('page')->cascadeOnDelete();
            $table->foreignId('audio_id')->references('id')->on('audio')->cascadeOnDelete();
            $table->foreignId('images_id')->references('id')->on('images')->cascadeOnDelete();
        });
        Schema::table('images', function (Blueprint $table) {
            $table->foreignId('text_id')->references('id')->on('text')->cascadeOnDelete()->nul;
        });
        Schema::table('page', function (Blueprint $table) {
            $table->foreignId('story_id')->references('id')->on('story')->cascadeOnDelete();
            $table->foreignId('images_id')->references('id')->on('images')->cascadeOnDelete();
        });
        Schema::table('interact', function (Blueprint $table) {
            $table->foreignId('page_id')->references('id')->on('page')->cascadeOnDelete();
            $table->foreignId('animation_id')->references('id')->on('animation')->cascadeOnDelete();
            $table->foreignId('text_id')->references('id')->on('text')->cascadeOnDelete();
            $table->foreignId('images_id')->references('id')->on('images')->cascadeOnDelete();
            $table->foreignId('interact_event_id')->references('id')->on('interact_event')->cascadeOnDelete();
        });
        Schema::table('story', function (Blueprint $table) {
            $table->foreignId('images_id')->references('id')->on('images')->cascadeOnDelete();
            $table->foreignId('creator_id')->references('id')->on('creator')->cascadeOnDelete();
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
